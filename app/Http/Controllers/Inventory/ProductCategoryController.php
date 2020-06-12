<?php

namespace App\Http\Controllers\Inventory;

use App\Enums\ResponseMessage;
use App\Enums\ResponseType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\ProductCategoryStoreRequest;
use App\Http\Requests\Inventory\ProductCategoryUpdateRequest;
use App\Models\Inventory\ProductCategory;
use App\Services\Inventory\ProductCategoryService;

class ProductCategoryController extends Controller
{

    protected $viewsDir;
    protected $productCategoryService;

    public function __construct(ProductCategoryService $productCategoryService) {
        $this->viewsDir = "application.inventory.product_categories.";
        $this->productCategoryService = $productCategoryService;
    }

    // ==================== VIEW METHODS =====================

    public function index()
    {
        $view_name = $this->viewsDir.'_partial._list';
        $product_categories = $this->productCategoryService->getProductCategoriesTree(null, collect(), 0, session('establishment_branch_id'));        
        return view($this->viewsDir.'template', compact(['view_name','product_categories']));
    }

    public function create()
    {
        $view_name = $this->viewsDir.'_partial._create';
        $product_category = new ProductCategory();
        $categories_list = $this->productCategoryService->getProductCategorySelectTree(NULL, '', 1, NULL, session('establishment_branch_id'));

        return view($this->viewsDir.'template',
            compact(['product_category','view_name','categories_list']));
    }

    public function show($id)
    {
        $view_name = $this->viewsDir.'_partial._view';
        $product_category = $this->productCategoryService->findProductCategoryByEncodedId($id);        

        return view($this->viewsDir.'template',
            compact(['product_category','view_name']));
    }

    public function edit($id)
    {
        $view_name = $this->viewsDir.'_partial._edit';
        $product_category = $this->productCategoryService->findProductCategoryByEncodedId($id);
        $categories_list = $this->productCategoryService->getProductCategorySelectTree(
            NULL, 
            '', 
            1, 
            $product_category->parent_category == null?null:$product_category->parent_category->product_category_id,
            session('establishment_branch_id')
        );        

        return view($this->viewsDir.'template',
            compact(['product_category','view_name','categories_list']));
    }


    // ==================== ACTION METHODS =====================

    public function preValidateStore(ProductCategoryStoreRequest $request) {
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

    public function store(ProductCategoryStoreRequest $request)
    {
        try {
            $product_category = $this->productCategoryService->createProductCategory($request, session('establishment_branch_id'));
            return redirect()
                ->route('show_product_category',['product_category_id' => $product_category->encoded_id()])
                ->with('success_message',ResponseMessage::SUCCESSFUL_SUBMIT);
        } catch(\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function preValidateUpdate(ProductCategoryUpdateRequest $request) {
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

    public function update(ProductCategoryUpdateRequest $request)
    {
        try {
            $product_category = $this->productCategoryService->updateProductCategory($request);
            return redirect()
                ->route('show_product_category',['product_category_id' => $product_category->encoded_id()])
                ->with('success_message',ResponseMessage::SUCCESSFUL_SUBMIT);
        } catch (\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        }

    }

}
