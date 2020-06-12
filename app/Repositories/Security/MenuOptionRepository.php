<?php

namespace App\Repositories\Security;

use App\Enums\ResponseMessage;
use App\Models\Security\MenuOption;
use Illuminate\Support\Facades\DB;

class MenuOptionRepository
{
    // ==================== APP MENU FUNCTIONS ===========================

    public function listRootMenuOptions($userId, $idEstBranch, $isSuperadmin) {
        if ($idEstBranch != null) {
            return DB::table('sec_menu_options')
                ->join('sec_roles_menu_options', 'sec_menu_options.menu_id', '=', 'sec_roles_menu_options.menu_id')
                ->join('sec_roles', 'sec_roles.role_id', '=', 'sec_roles_menu_options.role_id')
                ->join('sec_users_per_roles', 'sec_users_per_roles.role_id', '=', 'sec_roles.role_id')
                ->join('sec_users', 'sec_users_per_roles.user_id', '=', 'sec_users.user_id')
                ->where('sec_roles.state', 'A')
                ->where('sec_roles_menu_options.state', 'A')
                ->where('sec_menu_options.state', 'A')
                ->where('sec_users_per_roles.state', 'A')
                ->where('sec_users.user_id', $userId)
                ->where('sec_menu_options.type', 'EXT')
                ->where('sec_users_per_roles.establishment_branch_id', $idEstBranch)
                ->whereNull('menu_parent_id')
                ->orderBy('sec_menu_options.order', 'asc')
                ->select('sec_menu_options.*')
                ->distinct()
                ->get();
        } else if ($isSuperadmin) {
            return DB::table('sec_menu_options')
                ->join('sec_roles_menu_options', 'sec_menu_options.menu_id', '=', 'sec_roles_menu_options.menu_id')
                ->join('sec_roles', 'sec_roles.role_id', '=', 'sec_roles_menu_options.role_id')
                ->join('sec_users_per_roles', 'sec_users_per_roles.role_id', '=', 'sec_roles.role_id')
                ->join('sec_users', 'sec_users_per_roles.user_id', '=', 'sec_users.user_id')
                ->where('sec_roles.state', 'A')
                ->where('sec_roles_menu_options.state', 'A')
                ->where('sec_menu_options.state', 'A')
                ->where('sec_users_per_roles.state', 'A')
                ->where('sec_users.user_id', $userId)
                ->where('sec_menu_options.type', 'EXT')
                ->whereNull('sec_users_per_roles.establishment_branch_id')
                ->whereNull('menu_parent_id')
                ->orderBy('sec_menu_options.order', 'asc')
                ->select('sec_menu_options.*')
                ->distinct()
                ->get();
        } else {
            return collect();
        }
    }

    public function listChildrenMenuOptionsByUser($idUser, $idMenuParent, $idEstBranch, $isSuperadmin) {
        if ($idEstBranch != null) {
            return DB::table('sec_menu_options')
                ->join('sec_roles_menu_options', 'sec_menu_options.menu_id', '=', 'sec_roles_menu_options.menu_id')
                ->join('sec_roles', 'sec_roles.role_id', '=', 'sec_roles_menu_options.role_id')
                ->join('sec_users_per_roles', 'sec_users_per_roles.role_id', '=', 'sec_roles.role_id')
                ->join('sec_users', 'sec_users_per_roles.user_id', '=', 'sec_users.user_id')
                ->where('sec_roles.state', 'A')
                ->where('sec_roles_menu_options.state', 'A')
                ->where('sec_menu_options.state', 'A')
                ->where('sec_users_per_roles.state', 'A')
                ->where('sec_users.user_id', $idUser)
                ->where('sec_menu_options.type', 'EXT')
                ->where('menu_parent_id', $idMenuParent)
                ->where('sec_users_per_roles.establishment_branch_id',$idEstBranch)
                ->orderBy('sec_menu_options.order', 'asc')
                ->select('sec_menu_options.*')
                ->distinct()
                ->get();
        } else if ($isSuperadmin) {
            return DB::table('sec_menu_options')
                ->join('sec_roles_menu_options', 'sec_menu_options.menu_id', '=', 'sec_roles_menu_options.menu_id')
                ->join('sec_roles', 'sec_roles.role_id', '=', 'sec_roles_menu_options.role_id')
                ->join('sec_users_per_roles', 'sec_users_per_roles.role_id', '=', 'sec_roles.role_id')
                ->join('sec_users', 'sec_users_per_roles.user_id', '=', 'sec_users.user_id')
                ->where('sec_roles.state', 'A')
                ->where('sec_roles_menu_options.state', 'A')
                ->where('sec_menu_options.state', 'A')
                ->where('sec_users_per_roles.state', 'A')
                ->where('sec_users.user_id', $idUser)
                ->where('sec_menu_options.type', 'EXT')
                ->where('menu_parent_id', $idMenuParent)
                ->whereNull('sec_users_per_roles.establishment_branch_id')
                ->orderBy('sec_menu_options.order', 'asc')
                ->select('sec_menu_options.*')
                ->distinct()
                ->get();
        } else {
            return collect();
        }
    }

    public function listChildrenMenuOptions($idMenuParent) {
        return DB::table('sec_menu_options')
            ->join('sec_roles_menu_options','sec_menu_options.menu_id','=','sec_roles_menu_options.menu_id')
            ->join('sec_roles','sec_roles.role_id','=','sec_roles_menu_options.role_id')
            ->join('sec_users_per_roles','sec_users_per_roles.role_id','=','sec_roles.role_id')
            ->join('sec_users','sec_users_per_roles.user_id','=','sec_users.user_id')
            ->where('sec_roles.state','A')
            ->where('sec_roles_menu_options.state','A')
            ->where('sec_menu_options.state','A')
            ->where('sec_users_per_roles.state','A')
            //->where('menu_options.type','EXT')
            ->where('sec_menu_options.menu_parent_id',$idMenuParent)
            ->orderBy('sec_menu_options.order','asc')
            ->select('sec_menu_options.*')
            ->distinct()
            ->get();
    }

    public function getMenuAccessByUserUrlEstablishment($userId, $url, $idEstBranch) {
        if ($idEstBranch != null) {
            return DB::table('sec_menu_options')
                ->join('sec_roles_menu_options', 'sec_menu_options.menu_id', '=', 'sec_roles_menu_options.menu_id')
                ->join('sec_roles', 'sec_roles.role_id', '=', 'sec_roles_menu_options.role_id')
                ->join('sec_users_per_roles', 'sec_users_per_roles.role_id', '=', 'sec_roles.role_id')
                ->join('sec_users', 'sec_users_per_roles.user_id', '=', 'sec_users.user_id')
                ->where('sec_roles.state', 'A')
                ->where('sec_roles_menu_options.state', 'A')
                ->where('sec_menu_options.state', 'A')
                ->where('sec_users_per_roles.state', 'A')
                ->where('sec_users.user_id', $userId)
                ->where('sec_menu_options.url', $url)
                ->where('sec_users_per_roles.establishment_branch_id',$idEstBranch)
                ->select('sec_menu_options.*')
                ->distinct()
                ->get();
        } else {
            return DB::table('sec_menu_options')
                ->join('sec_roles_menu_options', 'sec_menu_options.menu_id', '=', 'sec_roles_menu_options.menu_id')
                ->join('sec_roles', 'sec_roles.role_id', '=', 'sec_roles_menu_options.role_id')
                ->join('sec_users_per_roles', 'sec_users_per_roles.role_id', '=', 'sec_roles.role_id')
                ->join('sec_users', 'sec_users_per_roles.user_id', '=', 'sec_users.user_id')
                ->where('sec_roles.state', 'A')
                ->where('sec_roles_menu_options.state', 'A')
                ->where('sec_menu_options.state', 'A')
                ->where('sec_users_per_roles.state', 'A')
                ->where('sec_users.user_id', $userId)
                ->where('sec_menu_options.url', $url)
                ->whereNull('sec_users_per_roles.establishment_branch_id')
                ->select('sec_menu_options.*')
                ->distinct()
                ->get();
        }
    }


    // ==================== MENU ADMINISTRATION FUNCTIONS  ===========================

    public function listRootMenuOptionsByState($arrayOfStates) {
        return MenuOption::whereNull('menu_parent_id')
            ->whereIn('state',$arrayOfStates)
            ->where('assignable',true)
            ->orderBy('order','asc')
            ->get();
    }

    public function listByParentState($idMenuParent, $arrayOfStates) {
        return MenuOption::where('menu_parent_id','=',$idMenuParent)
            ->whereIn('state',$arrayOfStates)
            ->where('assignable',true)
            ->orderBy('order','asc')
            ->get();
    }


    public function findById($id) {
        return MenuOption::findOrFail($id);
    }

    public function getByUrl($url) {
        return MenuOption::where('url',$url)->first();
    }

    public function create($menuOption) {
        try {
            $menuOption->save();
        } catch(\Exception $e) {
            throw new \Exception(ResponseMessage::BDD_SAVE_ERROR);
        }
        return $menuOption;
    }

    public function update($menuOption) {
        try {
            $menuOption->update();
        } catch(\Exception $e) {
            throw new \Exception(ResponseMessage::BDD_UPDATE_ERROR);
        }
        return $menuOption;
    }
}