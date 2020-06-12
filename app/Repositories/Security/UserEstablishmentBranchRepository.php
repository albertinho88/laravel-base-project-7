<?php

namespace App\Repositories\Security;

use App\Models\Security\UserEstablishmentBranch;

class UserEstablishmentBranchRepository
{
    public function getByUserEstBranchId($userId, $estBranchId) {
        return UserEstablishmentBranch::where('user_id',$userId)
            ->where('establishment_branch_id',$estBranchId)
            ->first();
    }

    public function listActiveByUserDiffEstBranchId($userId, $estBranchId) {
        return UserEstablishmentBranch::where('user_id',$userId)
            ->where('establishment_branch_id','<>',$estBranchId)
            ->where('state','A')
            ->get();
    }
}