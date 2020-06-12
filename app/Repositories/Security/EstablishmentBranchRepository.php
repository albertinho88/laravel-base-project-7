<?php

namespace App\Repositories\Security;

use App\Enums\ResponseMessage;
use App\Models\Security\EstablishmentBranch;

class EstablishmentBranchRepository
{

    public function listAllByEstablishmentAndState($establishment_id, $arrayOfStates) {
        return EstablishmentBranch::whereIn('state',$arrayOfStates)
            ->where('establishment_id',$establishment_id)
            ->orderBy('business_name','asc')
            ->get();
    }

    public function listByIds($arrayOfIds) {
        return EstablishmentBranch::whereIn('establishment_branch_id',$arrayOfIds)
            ->orderBy('business_name','asc')
            ->get();
    }

    public function getById($establishment_branch_id) {
        return EstablishmentBranch::with('establishment')->findOrFail($establishment_branch_id);
    }

    public function create($establishmentBranch) {
        try {
            $establishmentBranch->save();
        } catch(\Exception $e) {
            throw new \Exception(ResponseMessage::BDD_SAVE_ERROR);
        }
        return $establishmentBranch;
    }

    public function update($establishmentBranch) {
        try {
            $establishmentBranch->update();
        } catch(\Exception $e) {
            throw new \Exception(ResponseMessage::BDD_UPDATE_ERROR);
        }
        return $establishmentBranch;
    }

}