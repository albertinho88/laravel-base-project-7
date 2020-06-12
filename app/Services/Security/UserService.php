<?php

namespace App\Services\Security;

use App\Enums\SystemParameter;
use App\Mail\UserCreated;
use App\Models\Generic\Person;
use App\Repositories\Security\UserEstablishmentBranchRepository;
use App\Repositories\Security\UserRepository;
use App\Repositories\Security\UserRoleRepository;
use App\User;
use App\Models\Security\UserEstablishmentBranch;
use App\Models\Security\UserRole;
use App\Services\Common\GenerateRandomService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class UserService
{
    protected $userRepository;
    protected $userRoleRepository;
    protected $userEstablishmentBranchRepository;

    protected $roleService;    

    public function __construct(UserRepository $userRepository,
                                RoleService $roleService,
                                UserRoleRepository $userRoleRepository,
                                UserEstablishmentBranchRepository $userEstablishmentBranchRepository) {
        $this->userRepository = $userRepository;
        $this->roleService = $roleService;
        $this->userRoleRepository = $userRoleRepository;
        $this->userEstablishmentBranchRepository = $userEstablishmentBranchRepository;
    }

    public function listAllUsers() {
        $sess_est_branch_id = session('establishment_branch_id');
        $arrayOfStates = array('A','I');

        $usersList = User::whereHas('user_establishment_branches',function (Builder $query) use ($arrayOfStates, $sess_est_branch_id) {
            $query->whereIn('state',$arrayOfStates)
                ->where('establishment_branch_id',$sess_est_branch_id);
        })
        ->whereIn('state',$arrayOfStates)
        ->orderBy('name', 'asc')
        ->get();

        foreach($usersList as $u) {
            $u->generalState = $u->user_establishment_branches[0]->state;
            $active_user_roles = $this->listActiveRolesPerUserAndEstBranch($u->user_id);
            $u->listOfRolesPerEstBranch = collect();
            foreach($active_user_roles as $aur) {
                $u->listOfRolesPerEstBranch->push($aur->role);
            }

        }

        return $usersList;
    }

    public function findUserByEncodedId($encodedId) {
        $user = $this->userRepository->findById(User::decode_id($encodedId));

        return $user;
    }

    public function findUserById($userId) {
        return $this->userRepository->findById($userId);
    }

    public function getUserByEmail($email) {
        return $this->userRepository->getByEmail($email);
    }

    public function getUserByEmailEstablishmentBranch($email, $estBranchId) {
        return $this->userRepository->getByEmailEstBranch($email, $estBranchId);
    }

    public function getGeneralStateByUserEstablishmentBranch($userId) {
        $userEstBranch = $this->userEstablishmentBranchRepository->getByUserEstBranchId($userId, session('establishment_branch_id'));
        return $userEstBranch->state;
    }

    public function userActiveInOtherEstBranches($userId) {
        $estBranches = $this->userEstablishmentBranchRepository->listActiveByUserDiffEstBranchId($userId, session('establishment_branch_id'));
        return !$estBranches->isEmpty();
    }

    public function createUser($request) {

        $user = $this->getUserByEmail($request->email);
        $randomPass = GenerateRandomService::generarCadenaRandomica(8);        

        if(!$user) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($randomPass);
            $user->state = 'A';
            $user = $this->userRepository->create($user);
        } else {
            $user->name = $request->name;
            $user->password = Hash::make($randomPass);
            $user->state = 'A';
            $user = $this->userRepository->update($user);
        }

        $userEstablishmentBranch = new UserEstablishmentBranch();
        $userEstablishmentBranch->user_id = $user->user_id;
        $userEstablishmentBranch->establishment_branch_id = session('establishment_branch_id');
        $userEstablishmentBranch->state = 'A';
        $userEstablishmentBranch->save();

        if ($request->user_roles) :
            foreach ($request->user_roles as $userole) :
                $user_per_role = new UserRole();
                $user_per_role->role_id = $userole;
                $user_per_role->state = 'A';
                $user_per_role->establishment_branch_id = $userEstablishmentBranch->establishment_branch_id;
                $user->users_roles()->save($user_per_role);
            endforeach;
        endif;

        Mail::to($user->email)
            ->send(new UserCreated());

        return $user;
    }

    public function getPreUpdateUserValidationMessages($request) {
        $messagesList = collect();

        if($request->generalState == 'I') {
            $messagesList->push('Al inactivar este usuario, los roles asignados al mismo serán removidos.');
        }

        if($this->userActiveInOtherEstBranches($request->user_id)) {
            $messagesList->push('Este usuario se encuentra activo en otra(s) Sucursal(es).');
        }

        return $messagesList->isEmpty()?null:$messagesList;
    }

    public function updateUser($request) {
        $user = $this->userRepository->findById($request->user_id);
        $userActiveInOtherEstBranches = $this->userActiveInOtherEstBranches($user->user_id);
        $userEstBranch = $this->userEstablishmentBranchRepository->getByUserEstBranchId($user->user_id, session('establishment_branch_id'));

        if (!($userActiveInOtherEstBranches && $request->generalState == 'I')) {
            $user->state = $request->generalState;
        }

        $user->person->first_name = $request->first_name;
        $user->person->last_name = $request->last_name;
        $user->person->idtype_catdetail = $request->idtype_catdetail;
        $user->person->identification = $request->identification;
        $user->person->save();

        $user->name = $request->first_name . ' ' . $request->last_name;
        $user = $this->userRepository->update($user);

        $userEstBranch->state = $request->generalState;
        $userEstBranch->save();

        $active_user_roles = $this->listActiveRolesPerUserAndEstBranch(
            $user->user_id,
            session('establishment_branch_id'));

        if ($request->generalState == 'I') {

            if (!$active_user_roles->isEmpty()) :
                // Inactivar todos los roles activos
                foreach ($active_user_roles as $act_userole) :
                    $act_userole->state = 'I';
                    $user->users_roles()->save($act_userole);
                endforeach;
            endif;
        } else if ($request->generalState == 'A') {
            if (!$active_user_roles->isEmpty()) :
                if ($request->user_roles) :
                    // Save-Update Roles
                    foreach($active_user_roles as $usrol):
                        if (in_array($usrol->role_id, $request->user_roles)):
                            $request->user_roles = array_diff($request->user_roles, [$usrol->role_id]);
                        elseif (!in_array($usrol->role_id, $request->user_roles)) :
                            $usrol->state = 'I';
                            $user->users_roles()->save($usrol);
                        endif;
                    endforeach;
                else:
                    // Inactivar todos los roles activos
                    foreach ($active_user_roles as $act_userole) :
                        $act_userole->state = 'I';
                        $user->users_roles()->save($act_userole);
                    endforeach;
                endif;
            endif;

            if ($request->user_roles):
                //Crear roles
                foreach ($request->user_roles as $userole) :
                    $user_per_role = new UserRole();
                    $user_per_role->role_id = $userole;
                    $user_per_role->state = 'A';
                    $user_per_role->establishment_branch_id = session('establishment_branch_id');
                    $user->users_roles()->save($user_per_role);
                endforeach;
            endif;
        }

        return $user;
    }

    public function updateUserPersonalInfo($request) {
        $user = $this->userRepository->findById($request->user_id);
        $user->name = $request->name;
        return $this->userRepository->update($user);
    }

    public function updateUserPassword($request) {
        $user = $this->userRepository->findById($request->user_id);
        $user->password = Hash::make($request->new_password);
        return $this->userRepository->update($user);
    }

    public function listAllRoles($userId = null) {
        $rolesList = $this->roleService->listAllRoles();

        if ($userId != null) {
            $active_user_roles = $this->listActiveRolesPerUserAndEstBranch($userId);
            foreach ($rolesList as $role) :
                $role->selected = $active_user_roles->contains('role_id', $role->role_id);
            endforeach;
        }

        return $rolesList;
    }

    public function isSuperadminUser($userId) {
        $userPerRole = $this->userRoleRepository->getByRoleCode($userId, SystemParameter::SUPERADMIN);
        return !$userPerRole->isEmpty();
    }

    public function listActiveRolesPerUserAndEstBranch($userId) {
        return $this->userRoleRepository->listByUserEstablishmentBranchState($userId,session('establishment_branch_id'),array('A'));
    }

    public function getMinLevelActiveRolePerUser($userId) {
        // desarrollar lógica para obtener el nivel de rol mínimo de un usuario
        return 1;
    }
}
