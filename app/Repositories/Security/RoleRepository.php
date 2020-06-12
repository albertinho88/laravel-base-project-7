<?php

namespace App\Repositories\Security;

use App\Enums\ResponseMessage;
use App\Enums\SystemParameter;
use App\Models\Security\Role;

class RoleRepository
{
    public function listByState($arrayOfStates) {
        return Role::whereIn('state', $arrayOfStates)
            //->where('code', '<>',SystemParameter::SUPERADMIN)
            ->orderBy('level', 'asc')
            ->get();
    }

    /*public function listByStateBelowLevel($arrayOfStates, $level) {
        return Role::whereIn('state', $arrayOfStates)
            ->where('level', '>',$level)
            ->orderBy('level', 'asc')
            ->get();
    }*/

    public function findById($id) {
        return Role::findOrFail($id);
    }

    public function create($role) {
        try {
            $role->save();
        } catch(\Exception $e) {
            throw new \Exception(ResponseMessage::BDD_SAVE_ERROR);
        }
        return $role;
    }

    public function update($role) {
        try {
            $role->update();
        } catch(\Exception $e) {
            throw new \Exception(ResponseMessage::BDD_UPDATE_ERROR);
        }
        return $role;
    }

}