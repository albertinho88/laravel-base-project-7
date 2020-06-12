<?php

namespace App\Repositories\Security;

use App\Enums\ResponseMessage;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class UserRepository
{

    public function listByState($arrayOfStates) {
        return User::whereIn('state', $arrayOfStates)
            ->orderBy('name', 'asc')
            ->get();
    }

    public function listByStateEstablishmentBranch($arrayOfStates,$estBranchId) {
        return User::whereHas('user_establishment_branches',function (Builder $query) use ($arrayOfStates, $estBranchId) {
            $query->whereIn('state',$arrayOfStates)
                ->where('establishment_branch_id',$estBranchId);
        })
        ->whereIn('state',$arrayOfStates)
        ->orderBy('name', 'asc')
        ->get();
    }

    public function findById($userId) {
        return User::findOrFail($userId);
    }

    public function create($user) {
        try {
            $user->save();
        } catch(\Exception $e) {
            throw new \Exception(ResponseMessage::BDD_SAVE_ERROR . '. ' . $e->getMessage());
        }
        return $user;
    }

    public function update($user) {
        try {
            $user->update();
        } catch(\Exception $e) {
            throw new \Exception(ResponseMessage::BDD_UPDATE_ERROR);
        }
        return $user;
    }

    public function getByEmail($email) {
        try {
            return User::with('active_user_establishment_branches')
                ->where('email',$email)
                ->first();
        } catch(\Exception $e) {
            throw new \Exception(ResponseMessage::BDD_QUERY_ERROR);
        }
    }

    public function getByEmailEstBranch($email, $estBranchId) {
        return User::whereHas('user_establishment_branches', function (Builder $query) use ($estBranchId) {
            $query->where('establishment_branch_id',$estBranchId);
        })
        ->where('email',$email)
        ->first();
    }


}