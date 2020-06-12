<?php

namespace App\Http\Controllers\Security;

use App\Enums\ResponseMessage;
use App\Enums\ResponseType;
use App\Http\Requests\Security\MenuOptionStoreRequest;
use App\Http\Requests\Security\MenuOptionUpdateRequest;
use App\Models\Security\MenuOption;
use App\Services\Security\MenuOptionService;
use App\Http\Controllers\Controller;

class MenuOptionController extends Controller
{

    protected $viewsDir;
    protected $menuOptionService;

    public function __construct(MenuOptionService $menuOptionService) {
        $this->viewsDir = "application.security.menu_options.";
        $this->menuOptionService = $menuOptionService;
    }

    // ==================== VIEW METHODS =====================

    public function index()
    {
        $view_name = $this->viewsDir.'_partial._list';
        $menu_options = $this->menuOptionService->getMenuTree(null, collect(), 0);
        return view($this->viewsDir.'template', compact(['view_name','menu_options']));
    }

    public function create()
    {
        $view_name = $this->viewsDir.'_partial._create';
        $menu_option = new MenuOption();
        $menu_options_list = $this->menuOptionService->getMenuOptionSelectTree(NULL, '', 1, NULL);
        return view($this->viewsDir.'template', compact(['menu_option','view_name','menu_options_list']));
    }

    public function show($id)
    {
        $view_name = $this->viewsDir.'_partial._view';
        $menu_option = $this->menuOptionService->findMenuByEncodedId($id);
        return view($this->viewsDir.'template', compact(['menu_option','view_name']));
    }

    public function edit($id)
    {
        $view_name = $this->viewsDir.'_partial._edit';
        $menu_option = $this->menuOptionService->findMenuByEncodedId($id);
        $menu_options_list = $this->menuOptionService->getMenuOptionSelectTree(NULL, '', 1, $menu_option->parent_menu_option == null?null:$menu_option->parent_menu_option->menu_id);
        return view($this->viewsDir.'template', compact(['menu_option','view_name','menu_options_list']));
    }


    public function remove($id)
    {
        $view_name = $this->viewsDir.'_partial._delete';
        $menu_option = $this->menuOptionService->findMenuByEncodedId($id);
        return view($this->viewsDir.'template', compact(['menu_option','view_name']));
    }


    // ==================== ACTION METHODS =====================

    public function preValidateStore(MenuOptionStoreRequest $request) {
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

    public function store(MenuOptionStoreRequest $request)
    {
        try {
            $menu_option = $this->menuOptionService->createMenuOption($request);
            return redirect()
                ->route('show_menu_option',['menu_id' => $menu_option->encoded_id()])
                ->with('success_message',ResponseMessage::SUCCESSFUL_SUBMIT);
        } catch (\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function preValidateUpdate(MenuOptionUpdateRequest $request) {
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


    public function update(MenuOptionUpdateRequest $request)
    {
        try {
            $menu_option = $this->menuOptionService->updateMenuOption($request);
            return redirect()
                ->route('show_menu_option',['menu_id' => $menu_option->encoded_id()])
                ->with('success_message',ResponseMessage::SUCCESSFUL_SUBMIT);
        } catch (\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function destroy(MenuOption $menuOption)
    {
        //
    }









}
