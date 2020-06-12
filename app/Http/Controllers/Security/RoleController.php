<?php

namespace App\Http\Controllers\Security;

use App\Enums\ResponseMessage;
use App\Enums\ResponseType;
use App\Http\Requests\Security\RoleStoreRequest;
use App\Http\Requests\Security\RoleUpdateRequest;
use App\Models\Security\Role;
use App\Services\Security\RoleService;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    protected $viewsDir;
    protected $roleService;

    public function __construct(RoleService $roleService) {
        $this->viewsDir = "application.security.roles.";
        $this->roleService = $roleService;
    }

    // ==================== VIEW METHODS =====================

    public function index()
    {
        $view_name = $this->viewsDir.'_partial._list';
        $roles = $this->roleService->listAllRoles();
        return view($this->viewsDir.'template',
            compact(['view_name','roles']));
    }

    public function create()
    {
        $view_name = $this->viewsDir.'_partial._create';
        $role = new Role();
        $role->code = $this->roleService->generateRandomRoleCode();
        $active_menu_options = $this->roleService->listActiveMenuOptionTree(null, collect(), 1);

        return view($this->viewsDir.'template',
            compact(['role','view_name','active_menu_options']));
    }

    public function show($id)
    {
        $view_name = $this->viewsDir.'_partial._view';
        $role = $this->roleService->findRoleByEncodedId($id);
        $active_menu_options = $this->roleService->listActiveMenuOptionTree(null, collect(), 1, $role->role_id);

        return view($this->viewsDir.'template',
            compact(['role','view_name','active_menu_options']));
    }

    public function edit($id)
    {
        $view_name = $this->viewsDir.'_partial._edit';
        $role = $this->roleService->findRoleByEncodedId($id);
        $active_menu_options = $this->roleService->listActiveMenuOptionTree(null, collect(), 1, $role->role_id);

        return view($this->viewsDir.'template',
            compact(['role','view_name','active_menu_options']));
    }


    // ==================== ACTION METHODS =====================

    public function preValidateStore(RoleStoreRequest $request) {
        $jsonResponse = array();

        try {
            // otras validaciones

            $jsonResponse['responseType'] = ResponseType::SUCCESS;
            $jsonResponse['responseMessage'] = '';

        } catch(\Exception $e) {
            $jsonResponse['responseType'] = ResponseType::ERROR;
            $jsonResponse['responseMessage'] = $e->getMessage();
        }

        return response()->json($jsonResponse);
    }

    public function store(RoleStoreRequest $request)
    {
        try {
            $role = $this->roleService->createRole($request);
            return redirect()
                ->route('show_role',['role_id' => $role->encoded_id()])
                ->with('success_message',ResponseMessage::SUCCESSFUL_SUBMIT);
        } catch(\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function preValidateUpdate(RoleUpdateRequest $request) {
        $jsonResponse = array();

        try {
            // otras validaciones

            $jsonResponse['responseType'] = ResponseType::SUCCESS;
            $jsonResponse['responseMessage'] = '';

        } catch (\Exception $e) {
            $jsonResponse['responseType'] = ResponseType::ERROR;
            $jsonResponse['responseMessage'] = $e->getMessage();
        }

        return response()->json($jsonResponse);
    }

    public function update(RoleUpdateRequest $request)
    {
        try {
            $role = $this->roleService->updateRole($request);
            return redirect()
                ->route('show_role',['role_id' => $role->encoded_id()])
                ->with('success_message',ResponseMessage::SUCCESSFUL_SUBMIT);
        } catch (\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        }

    }


}
