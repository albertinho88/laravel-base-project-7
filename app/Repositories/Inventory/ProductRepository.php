<?php

namespace App\Repositories\Inventory;

use App\Enums\ResponseMessage;
use App\Models\Inventory\Product;

class ProductRepository
{
    public function listByState($arrayOfStates) {
        return Product::whereIn('state',$arrayOfStates)->get();
    }
    
    public function findById($id) {
        return Product::findOrFail($id);
    }

    public function create($product) {
        try {
            $product->save();
        } catch(\Exception $e) {
            throw new \Exception(ResponseMessage::BDD_SAVE_ERROR);
        }
        return $product;
    }

    public function update($product) {
        try {
            $product->update();
        } catch(\Exception $e) {
            throw new \Exception(ResponseMessage::BDD_UPDATE_ERROR);
        }
        return $product;
    }

    public function listByStateAndCategory($arrayOfStates, $productCategoryId) {
        return Product::whereIn('state',$arrayOfStates)
            ->where('product_category_id',$productCategoryId)
            ->get();
    }

    public function listByStateAndCategories($arrayOfStates, $categoriesList) {
        return Product::whereIn('state',$arrayOfStates)
            ->whereIn('product_category_id',$categoriesList)
            ->get();
    }
}
