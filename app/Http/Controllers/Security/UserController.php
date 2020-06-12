<?php

namespace App\Http\Controllers\Security;

use App\Enums\CatalogEnum;
use App\Enums\ResponseMessage;
use App\Enums\ResponseType;
use App\Http\Requests\Security\UserStoreRequest;
use App\Http\Requests\Security\UserUpdateRequest;
use App\Services\Security\UserService;
use App\Services\Generic\CatalogService;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Generic\Person;

class UserController extends Controller
{
    protected $viewsDir;
    protected $userService;

    protected $catalogService;

    public function __construct(UserService $userService, CatalogService $catalogService) {
        $this->viewsDir = "application.security.users.";
        $this->userService = $userService;
        $this->catalogService = $catalogService;
    }

    // ==================== VIEW METHODS =====================

    public function index()
    {
        $view_name = $this->viewsDir.'_partial._list';
        $users = $this->userService->listAllUsers();
        return view($this->viewsDir.'template',
            compact(['view_name','users']));
    }

    public function create()
    {
        $view_name = $this->viewsDir.'_partial._create';
        $user = new User();
        $user->person = new Person();
        $roles = $this->userService->listAllRoles();
        $id_types = $this->catalogService->listActiveDetailsByCatalog(CatalogEnum::TIPOS_IDENTIFICACION);
        $minLevelCreator = $this->userService->getMinLevelActiveRolePerUser(auth()->user()->user_id);

        return view($this->viewsDir.'template',
            compact(['user','view_name','roles','id_types','minLevelCreator']));
    }

    public function edit($id)
    {
        $view_name = $this->viewsDir.'_partial._edit';
        $user = $this->userService->findUserByEncodedId($id);
        $roles = $this->userService->listAllRoles($user->user_id);
        $id_types = $this->catalogService->listActiveDetailsByCatalog(CatalogEnum::TIPOS_IDENTIFICACION);
        $user->generalState = $this->userService->getGeneralStateByUserEstablishmentBranch($user->user_id);
        $minLevelCreator = $this->userService->getMinLevelActiveRolePerUser(auth()->user()->user_id);

        return view($this->viewsDir.'template',
            compact(['user','view_name','roles','id_types','minLevelCreator']));
    }

    public function show($id)
    {
        $view_name = $this->viewsDir.'_partial._view';
        $user = $this->userService->findUserByEncodedId($id);
        $active_user_roles = $this->userService->listActiveRolesPerUserAndEstBranch($user->user_id);
        $user->generalState = $this->userService->getGeneralStateByUserEstablishmentBranch($user->user_id);

        return view($this->viewsDir.'template', compact(['user','view_name','active_user_roles']));
    }


    // ==================== ACTION METHODS =====================

    public function preValidateStore(UserStoreRequest $request) {

        $jsonResponse = array();

        try {

            // validar si la identificacion ingresada ya existe

            // $jsonResponse['messagesList'] = lógica de pre validación en caso de existir
            $jsonResponse['responseType'] = ResponseType::SUCCESS;
            $jsonResponse['responseMessage'] = '';
        } catch(\Exception $e) {
            $jsonResponse['responseType'] = ResponseType::ERROR;
            $jsonResponse['responseMessage'] = $e->getMessage();
        }

        return response()->json($jsonResponse);
    }

    public function store(UserStoreRequest $request)
    {
        try {
            $user = $this->userService->createUser($request);
            return redirect()
                ->route('show_user',['user_id' => $user->encoded_id()])
                ->with('success_message',ResponseMessage::SUCCESSFUL_SUBMIT);
        } catch (\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function preValidateUpdate(UserUpdateRequest $request) {

        $jsonResponse = array();

        try {
            $jsonResponse['messagesList'] = $this->userService->getPreUpdateUserValidationMessages($request);
            $jsonResponse['responseType'] = ResponseType::SUCCESS;
            $jsonResponse['responseMessage'] = '';
        } catch(\Exception $e) {
            $jsonResponse['responseType'] = ResponseType::ERROR;
            $jsonResponse['responseMessage'] = $e->getMessage();
        }

        return response()->json($jsonResponse);
    }

    public function update(UserUpdateRequest $request)
    {
        try {
            $user = $this->userService->updateUser($request);
            return redirect()
                ->route('show_user',['user_id' => $user->encoded_id()])
                ->with('success_message',ResponseMessage::SUCCESSFUL_SUBMIT);
        } catch(\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        }
    }



}
