<?php

namespace App\Repositories\Security;

use App\Models\Security\UserRole;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class UserRoleRepository
{
    public function getByRoleCode($userId, $roleCode) {
        return DB::table('sec_users_per_roles')
            ->join('sec_users','sec_users.user_id','=','sec_users_per_roles.user_id')
            ->join('sec_roles','sec_roles.role_id','=','sec_users_per_roles.role_id')
            ->where('sec_users.state','A')
            ->where('sec_roles.state','A')
            ->where('sec_users_per_roles.state','A')
            ->where('sec_users.user_id',$userId)
            ->where('sec_roles.code',$roleCode)
            ->select('sec_users_per_roles.*')
            ->get();
    }

    public function listByUserEstablishmentBranchState($userId, $estBranchId, $arrayOfStates) {
        return UserRole::whereIn('state',$arrayOfStates)
            ->where('establishment_branch_id',$estBranchId)
            ->where('user_id',$userId)
            ->get();
    }
}