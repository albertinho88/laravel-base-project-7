<?php

namespace App\Http\Controllers\Cms;

use App\Enums\ResponseType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\WebMenuStoreRequest;
use App\Http\Requests\Cms\WebMenuUpdateRequest;
use App\Services\Cms\WebMenuService;
use Illuminate\Http\Request;

class WebMenuController extends Controller
{
    protected $viewsDir;
    protected $webMenuService;

    public function __construct(WebMenuService $webMenuService) {
        $this->viewsDir = "application.cms.web_menus.";
        $this->webMenuService = $webMenuService;
    }

    // ==================== VIEW METHODS =====================

    public function index()
    {
        $view_name = $this->viewsDir.'_partial._list';
        $web_menus = $this->webMenuService->listAllWebMenus();
        return view($this->viewsDir.'template', compact(['view_name','web_menus']));
    }

    public function create()
    {
        /*$view_name = $this->viewsDir.'_partial._create';
        $menu_option = new MenuOption();
        $menu_options_list = $this->menuOptionService->getMenuOptionSelectTree(NULL, '', 1, NULL);
        return view($this->viewsDir.'template', compact(['menu_option','view_name','menu_options_list']));*/
    }

    public function show($id)
    {
        $view_name = $this->viewsDir.'_partial._view';
        $web_menu = $this->webMenuService->findWebMenuByEncodedId($id);
        return view($this->viewsDir.'template', compact(['web_menu','view_name']));
    }

    public function edit($id)
    {
        $view_name = $this->viewsDir.'_partial._edit';
        $web_menu = $this->webMenuService->findWebMenuByEncodedId($id);
        //$menu_options_list = $this->menuOptionService->getMenuOptionSelectTree(NULL, '', 1, $menu_option->parent_menu_option == null?null:$menu_option->parent_menu_option->menu_id);
        return view($this->viewsDir.'template', compact(['web_menu','view_name']));
    }


    public function remove($id)
    {
        /*$view_name = $this->viewsDir.'_partial._delete';
        $menu_option = $this->menuOptionService->findMenuByEncodedId($id);
        return view($this->viewsDir.'template', compact(['menu_option','view_name']));*/
    }


    // ==================== ACTION METHODS =====================

    public function preValidateStore(WebMenuStoreRequest $request) {
        /*$jsonResponse = array();

        try {

            // otras validaciones

            $jsonResponse['responseType'] = ResponseType::SUCCESS;
            $jsonResponse['responseMessage'] = '';
        } catch (\Exception $e) {
            $jsonResponse['responseType'] = ResponseType::ERROR;
            $jsonResponse['responseMessage'] = $e->getMessage();
        }

        return response()->json($jsonResponse);*/
    }

    public function store(WebMenuStoreRequest $request)
    {
        /*try {
            $menu_option = $this->menuOptionService->createMenuOption($request);
            return redirect()
                ->route('show_menu_option',['menu_id' => $menu_option->encoded_id()])
                ->with('success_message',ResponseMessage::SUCCESSFUL_SUBMIT);
        } catch (\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        }*/
    }

    public function preValidateUpdate(WebMenuUpdateRequest $request) {
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


    public function update(WebMenuUpdateRequest $request)
    {
        /*try {
            $menu_option = $this->menuOptionService->updateMenuOption($request);
            return redirect()
                ->route('show_menu_option',['menu_id' => $menu_option->encoded_id()])
                ->with('success_message',ResponseMessage::SUCCESSFUL_SUBMIT);
        } catch (\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        }*/
    }
}
