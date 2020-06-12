<?php

namespace App\Http\Controllers\Security;

use App\Enums\ResponseMessage;
use App\Enums\ResponseType;
use App\Models\Security\EstablishmentBranch;
use App\Http\Requests\Security\EstablishmentBranchStoreRequest;
use App\Http\Requests\Security\EstablishmentBranchUpdateRequest;
use App\Services\Security\EstablishmentService;
use App\Http\Controllers\Controller;

class EstablishmentBranchController extends Controller
{
    protected $establishmentService;
    protected $viewsDir;

    public function __construct(EstablishmentService $establishmentService)
    {
        $this->establishmentService = $establishmentService;
        $this->viewsDir = "application.establishment.establishment_branches.";
    }

    // ==================== VIEW METHODS =====================

    public function index()
    {
        $view_name = $this->viewsDir.'_partial._list';
        $establishment_branches = $this->establishmentService->listAllEstablishmentBranches();
        return view($this->viewsDir.'template', compact(['view_name','establishment_branches']));
    }

    public function create()
    {
        $view_name = $this->viewsDir.'_partial._create';
        $establishment_branch = new EstablishmentBranch();
        $establishment = $this->establishmentService->getMainEstablishment();
        return view($this->viewsDir.'template', compact(['establishment', 'establishment_branch','view_name']));
    }

    public function edit($id)
    {
        $view_name = $this->viewsDir.'_partial._edit';
        $establishment_branch = $this->establishmentService->getEstablishmentBranchByEncodedId($id);
        $establishment = $establishment_branch->establishment;
        return view($this->viewsDir.'template', compact(['establishment', 'establishment_branch','view_name']));
    }

    public function show($id)
    {
        $view_name = $this->viewsDir.'_partial._view';
        $establishment_branch = $this->establishmentService->getEstablishmentBranchByEncodedId($id);
        return view($this->viewsDir.'template', compact(['establishment_branch','view_name']));
    }


    // ==================== ACTION METHODS =====================

    public function preValidateStore(EstablishmentBranchStoreRequest $request) {
        $jsonResponse = array();

        try {

            // lógica de validaciones adicionales

            $jsonResponse['responseType'] = ResponseType::SUCCESS;
            $jsonResponse['responseMessage'] = '';
        } catch (\Exception $e) {
            $jsonResponse['responseType'] = ResponseType::ERROR;
            $jsonResponse['responseMessage'] = $e->getMessage();
        }

        return response()->json($jsonResponse);
    }

    public function store(EstablishmentBranchStoreRequest $request)
    {
        try {
            $establishment_branch = $this->establishmentService->createEstablishmentBranch($request);
            return redirect()
                ->route('show_establishment_branch',['establishment_branch_id' => $establishment_branch->encoded_id()])
                ->with('success_message',ResponseMessage::SUCCESSFUL_SUBMIT);
        } catch (\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function preValidateUpdate(EstablishmentBranchUpdateRequest $request) {
        $jsonResponse = array();

        try {

            // lógica de validaciones adicionales

            $jsonResponse['responseType'] = ResponseType::SUCCESS;
            $jsonResponse['responseMessage'] = '';
        } catch (\Exception $e) {
            $jsonResponse['responseType'] = ResponseType::ERROR;
            $jsonResponse['responseMessage'] = $e->getMessage();
        }

        return response()->json($jsonResponse);
    }

    public function update(EstablishmentBranchUpdateRequest $request)
    {
        try {
            $establishment_branch = $this->establishmentService->updateEstablishmentBranch($request);
            return redirect()
                ->route('show_establishment_branch',['establishment_branch_id' => $establishment_branch->encoded_id()])
                ->with('success_message',ResponseMessage::SUCCESSFUL_SUBMIT);
        } catch (\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        }
    }

}
