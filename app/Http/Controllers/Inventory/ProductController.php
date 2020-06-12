<?php

namespace App\Http\Controllers\Inventory;

use App\Enums\ResponseMessage;
use App\Enums\ResponseType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\ProductStoreRequest;
use App\Http\Requests\Inventory\ProductUpdateRequest;
use App\Http\Requests\Inventory\ProductImageUploadRequest;
use App\Models\Inventory\Product;
use App\Services\Inventory\ProductCategoryService;
use App\Services\Inventory\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    protected $viewsDir;
    protected $productService;
    protected $productCategoryService;

    public function __construct(ProductService $productService, ProductCategoryService $productCategoryService) {
        $this->viewsDir = "application.inventory.products.";
        $this->productService = $productService;
        $this->productCategoryService = $productCategoryService;
    }

    // ==================== VIEW METHODS =====================

    public function index()
    {
        $view_name = $this->viewsDir.'_partial._list';
        $products = $this->productService->listAllProducts(session('establishment_branch_id'));
        return view($this->viewsDir.'template',
            compact(['view_name','products']));
    }

    public function create()
    {
        $view_name = $this->viewsDir.'_partial._create';
        $product = new Product();

        $product_categories = $this->productCategoryService->getProductCategorySelectTree(
            null, 
            '', 
            1, 
            $product->product_category_id,
            session('establishment_branch_id'));
            
        $product_brands = $this->productService->listaActiveBrands();

        return view($this->viewsDir.'template',
        compact(['product','view_name','product_categories','product_brands']));             
    }

    public function show($id)
    {
        $view_name = $this->viewsDir.'_partial._view';
        $product = $this->productService->findProductByEncodedId($id);        

        return view($this->viewsDir.'template',
            compact(['product','view_name']));
    }

    public function edit($id)
    {
        $view_name = $this->viewsDir.'_partial._edit';
        $product = $this->productService->findProductByEncodedId($id);

        $product_categories = $this->productCategoryService->getProductCategorySelectTree(
            null, 
            '', 
            1, 
            $product->product_category_id,
            session('establishment_branch_id')); 
            
        $product_brands = $this->productService->listaActiveBrands();

        return view($this->viewsDir.'template',
            compact(['product','view_name','product_categories','product_brands']));
    }


    // ==================== ACTION METHODS =====================

    public function preValidateStore(ProductStoreRequest $request) {
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

    public function store(ProductStoreRequest $request)
    {
        try {
            $product = $this->productService->createProduct($request, session('establishment_branch_id'));
            return redirect()
                ->route('show_product',['product_id' => $product->encoded_id()])
                ->with('success_message',ResponseMessage::SUCCESSFUL_SUBMIT);
        } catch(\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        }    
    }

    public function preValidateUpdate(ProductUpdateRequest $request) {
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

    public function update(ProductUpdateRequest $request)
    {
        try {
            $product = $this->productService->updateProduct($request);
            return redirect()
                ->route('show_product',['product_id' => $product->encoded_id()])
                ->with('success_message',ResponseMessage::SUCCESSFUL_SUBMIT);
        } catch(\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        } 
    }

    public function manageImages($id) {
        $view_name = $this->viewsDir.'_partial._gallery';
        $product = $this->productService->findProductByEncodedId($id);        
        return view($this->viewsDir.'template',
            compact(['product','view_name']));
    }

    public function preValidateUploadProductImage(ProductImageUploadRequest $request) {
        $jsonResponse = array();

        try {
                        
            $jsonResponse['messagesList'] = $this->productService->getPreUploadImageValidationMessages($request);
            $jsonResponse['responseType'] = ResponseType::SUCCESS;
            $jsonResponse['responseMessage'] = '';

        } catch (\Exception $e) {
            $jsonResponse['responseType'] = ResponseType::ERROR;
            $jsonResponse['responseMessage'] = $e->getMessage();
        }

        return response()->json($jsonResponse);
    }

    public function uploadProductImage(ProductImageUploadRequest $request) {

        try {
            $product = $this->productService->uploadProductImage($request);
            
            return redirect()
                    ->route('manage_product_images',['product_id' => $product->encoded_id()])
                    ->with('success_message',ResponseMessage::SUCCESSFUL_SUBMIT);

        } catch(\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        } 
        
    }

    public function deleteProductImage(Request $request) {

        try {
            $product = $this->productService->deleteProductImage($request);
            return redirect()
                ->route('manage_product_images',['product_id' => $product->encoded_id()])
                ->with('success_message',ResponseMessage::SUCCESSFUL_SUBMIT);
        } catch(\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        } 

        $jsonResponse = array();

        $jsonResponse['responseType'] = ResponseType::SUCCESS;
        $jsonResponse['responseMessage'] = ResponseMessage::SUCCESSFUL_DELETE;

        return response()->json($jsonResponse);

    }

    public function listProductImagesJson($id) {
        $product = Product::findOrFail(Product::decode_id($id));
    }

}
