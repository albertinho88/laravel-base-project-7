<?php

namespace App\Services\Security;

use App\Models\Security\EstablishmentBranch;
use App\Repositories\Security\EstablishmentBranchRepository;
use App\Repositories\Security\EstablishmentRepository;

class EstablishmentService
{
    protected $establishmentBranchRepository;
    protected $establishmentRepository;

    public function __construct(EstablishmentBranchRepository $establishmentBranchRepository, EstablishmentRepository $establishmentRepository)
    {
        $this->establishmentBranchRepository = $establishmentBranchRepository;
        $this->establishmentRepository = $establishmentRepository;
    }

    public function getMainEstablishment() {
        return $this->establishmentRepository->getMainEstablishment();
    }

    public function listAllEstablishmentBranches() {
        $establishment = $this->getMainEstablishment();
        return $this->establishmentBranchRepository->listAllByEstablishmentAndState($establishment->establishment_id, array('A','I'));
    }

    public function listEstablishmentBranchesByIds($arrayOfIds) {
        return $this->establishmentBranchRepository->listByIds($arrayOfIds);
    }

    public function getEstablishmentBranchByEncodedId($encodedId) {
        return $this->establishmentBranchRepository->getById(EstablishmentBranch::decode_id($encodedId));
    }

    public function getEstablishmentBranchById($branchId) {
        return $this->establishmentBranchRepository->getById($branchId);
    }

    public function createEstablishmentBranch($request) {
        $establishment_branch = new EstablishmentBranch();
        $establishment_branch->code = $request->code;
        $establishment_branch->business_name = $request->business_name;
        $establishment_branch->establishment_id =  $request->establishment_id;
        $establishment_branch->state = 'A';
        return $this->establishmentBranchRepository->create($establishment_branch);
    }

    public function updateEstablishmentBranch($request) {
        $establishment_branch = $this->establishmentBranchRepository->getById($request->establishment_branch_id);
        $establishment_branch->business_name = $request->business_name;
        $establishment_branch->state = $request->state;
        return $this->establishmentBranchRepository->update($establishment_branch);
    }

}