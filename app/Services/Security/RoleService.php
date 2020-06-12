<?php

namespace App\Services\Security;

use App\Enums\SystemParameter;
use App\Repositories\Security\RoleRepository;
use App\Models\Security\Role;
use App\Models\Security\RoleMenuOption;

class RoleService
{
    protected $roleRepository;

    protected $menuOptionService;

    public function __construct(RoleRepository $roleRepository, MenuOptionService $menuOptionService) {
        $this->roleRepository = $roleRepository;
        $this->menuOptionService = $menuOptionService;
    }

    public function listAllRoles() {
        return $this->roleRepository->listByState(array('A','I'));
    }

    public function findRoleByEncodedId($encodedId) {
        return $this->roleRepository->findById(Role::decode_id($encodedId));
    }

    public function listActiveMenuOptionTree($idMenuParent, $menu_tree, $nivel, $roleId = null)
    {
        $menuList = $this->menuOptionService->listActiveMenuOptionsTree($idMenuParent, $menu_tree, $nivel);

        if ($roleId != null) {
            $role = $this->roleRepository->findById($roleId);
            foreach ($menuList as $menop) :
                if ($role->active_role_menu_options->contains('menu_id', $menop->menu_id)) :
                    $menop->selected = 'checked';
                endif;
            endforeach;
        }

        return $menuList;
    }

    public function generateRandomRoleCode() {
        return 'ROL'.date('YmdHis');
    }

    public function createRole($request) {
        $role = new Role();
        $role->code = $request->code;
        $role->name = $request->name;
        $role->level = $request->level;
        $role->state = 'A';
        $role = $this->roleRepository->create($role);

        if ($request->role_menu_options) :
            foreach ($request->role_menu_options as $menuop) :
                $role_per_menop = new RoleMenuOption();
                $role_per_menop->menu_id = $menuop;
                $role_per_menop->state = 'A';
                $role->role_menu_options()->save($role_per_menop);
            endforeach;
        endif;

        return $role;
    }

    public function updateRole($request) {
        $role = $this->roleRepository->findById($request->role_id);
        $role->name = $request->name;
        $role->state = $request->state;
        $role->level = $request->level;
        $role = $this->roleRepository->update($role);

        if (!$role->active_role_menu_options->isEmpty()) :
            if ($request->role_menu_options) :
                // Save-Update Menu Options
                foreach ($role->active_role_menu_options as $role_menop):
                    if (in_array($role_menop->menu_id, $request->role_menu_options)):
                        $request->role_menu_options = array_diff($request->role_menu_options, [$role_menop->menu_id]);
                    elseif (!in_array($role_menop->menu_id, $request->role_menu_options)) :
                        $role_menop->state = 'I';
                        $role->role_menu_options()->save($role_menop);
                    endif;
                endforeach;
            else:
                // Inactivar todos los menĂº opciones activos
                foreach ($role->active_role_menu_options as $role_menop) :
                    $role_menop->state = 'I';
                    $role->role_menu_options()->save($role_menop);
                endforeach;
            endif;
        endif;

        if ($request->role_menu_options) :
            foreach ($request->role_menu_options as $menuop) :
                $role_per_menop = new RoleMenuOption();
                $role_per_menop->menu_id = $menuop;
                $role_per_menop->state = 'A';
                $role->role_menu_options()->save($role_per_menop);
            endforeach;
        endif;

        return $role;
    }

}