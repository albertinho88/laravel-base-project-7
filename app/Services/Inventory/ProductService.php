<?php

namespace App\Services\Inventory;

use App\Models\Inventory\Product;
use App\Models\Inventory\ProductBrand;
use App\Models\Inventory\ProductImage;
use App\Repositories\Inventory\ProductRepository;
use App\Services\Common\ImageService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    protected $productRepository;    
    protected $imageService;

    public function __construct(ProductRepository $productRepository, ImageService $imageService) {
        $this->productRepository = $productRepository;        
        $this->imageService = $imageService;
    }

    public function listAllProducts($estBranchId) {
        $arrayOfStates = array('A','I');

        return Product::whereHas('product_category',function (Builder $query) use ($arrayOfStates, $estBranchId) {
                    $query->whereIn('state',$arrayOfStates)
                        ->where('establishment_branch_id',$estBranchId);
                })
                ->whereIn('state',$arrayOfStates)
                ->orderBy('name', 'asc')
                ->get();
    }

    public function listaActiveBrands() {
        return ProductBrand::where('state','A')
                ->orderBy('name','asc')
                ->get();
    }

    public function findProductByEncodedId($encodedId) {
        return $this->productRepository->findById(Product::decode_id($encodedId));
    }    

    public function createProduct($request, $sessEstBranchId) {
        $product = new Product();

        $product->uni_code = $request->uni_code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->state = $request->state;
        $product->product_category_id = $request->product_category_id;
        $product->product_brand_id = $request->product_brand_id;
        $product->establishment_branch_id = $sessEstBranchId;

        $product = $this->productRepository->create($product);         

        return $product;
    }

    public function updateProduct($request) {
        $product = $this->productRepository->findById($request->product_id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->state = $request->state;
        $product->product_category_id = $request->product_category_id;
        $product->product_brand_id = $request->product_brand_id;
        return $this->productRepository->update($product);
    }

    public function getPreUploadImageValidationMessages($request) {
        $messagesList = collect();

        $newImage =  $request->file('new_image');
        //$pathName = $newImage->pathName;
        $messagesList->push('Este usuario se encuentra activo en otra(s) Sucursal(es).');
        
        return $messagesList->isEmpty()?null:$messagesList;
    }

    public function uploadProductImage($request) {
        $product = $this->productRepository->findById($request->product_id);

        $product_imgs_dir = $product->product_category->code . DIRECTORY_SEPARATOR . $product->uni_code;        

        if (!Storage::disk('products')->exists($product_imgs_dir)) {
            Storage::disk('products')->makeDirectory($product_imgs_dir);
        }

        if (!Storage::disk('products_thumbs')->exists($product_imgs_dir)) {
            Storage::disk('products_thumbs')->makeDirectory($product_imgs_dir);
        }

        $newImagePath = $request->file('new_image')->store($product_imgs_dir, 'products');
        $filePath = Storage::disk('products')->path($newImagePath);

        $this->imageService->createThumbnail($filePath, Storage::disk('products_thumbs')->path($newImagePath), 100, 75);

        $check = getimagesize($filePath);

        $newImage = new ProductImage();
        $newImage->width = $check[0];
        $newImage->height = $check[1];                
        $newImage->size_kb = number_format(Storage::disk('products')->size($newImagePath)/1024,2);        
        $newImage->src = $newImagePath;        
        $newImage->order = 0;
        $newImage->mime_type = Storage::disk("products")->getMimetype($newImagePath);
        $product->product_images()->save($newImage);

        clearstatcache();

        return $product;
    }

    public function deleteProductImage($request) {
        $product = $this->productRepository->findById($request->product_id);
        $productImg = ProductImage::where('productimage_id',$request->productimage_id)->delete();
        Storage::disk('products')->delete($request->src);
        Storage::disk('products_thumbs')->delete($request->src);
        return $product;
    }


    // ======================= WEBSITE =========================

    public function listActiveProductsByCategory($productCategoryId) {
        return $this->productRepository->listByStateAndCategory(array('A'),$productCategoryId);
    }

    public function listProductsWithEncodedId($productList) {
        foreach ($productList as $product) {
            $product->encoded_id = $product->encoded_id();
        }
        return $productList;
    }

    public function listActiveProductsByFilters($request) {
        
        $result = array();

        if (isset($request->product_categories) && !empty($request->product_categories) 
            && isset($request->product_brands) && !empty($request->product_brands)) {

            $result = Product::whereIn('state',array('A'))
            ->whereIn('product_category_id',$request->product_categories)
            ->whereIn('product_brand_id',$request->product_brands)
            ->with('product_category','product_images')
            ->get();
  
        } else if (isset($request->product_categories) && !empty($request->product_categories)) {

            $result = Product::whereIn('state',array('A'))
            ->whereIn('product_category_id',$request->product_categories)
            ->with('product_category','product_images')            
            ->get();

        } else if (isset($request->product_brands) && !empty($request->product_brands)) {

            $result = Product::whereIn('state',array('A'))            
            ->whereIn('product_brand_id',$request->product_brands)
            ->with('product_category','product_images')
            ->get();

        } else {
            $result = Product::whereIn('state',array('A'))
            ->with('product_category','product_images')
            ->get();
        }

        return $this->listProductsWithEncodedId($result);
    }

    public function listAllActiveProducts() {
        return $this->listProductsWithEncodedId(
            $this->productRepository->listByState(array('A')));
    }

}
