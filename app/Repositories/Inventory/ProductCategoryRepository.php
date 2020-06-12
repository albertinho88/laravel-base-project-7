<?php

namespace App\Repositories\Inventory;

use App\Enums\ResponseMessage;
use App\Models\Inventory\ProductCategory;

class ProductCategoryRepository
{
    public function listByState($arrayOfStates) {
        return ProductCategory::whereIn('state', $arrayOfStates)
            ->orderBy('code', 'asc')
            ->get();
    }

    public function listRootProductCategoriesByState($arrayOfStates) {
        return ProductCategory::whereNull('parent_id')
            ->whereIn('state',$arrayOfStates)
            ->orderBy('name','asc')
            ->get();
    }

    public function listByParentState($idCategoryParent, $arrayOfStates) {
        return ProductCategory::where('parent_id','=',$idCategoryParent)
            ->whereIn('state',$arrayOfStates)
            ->orderBy('name','asc')
            ->get();
    }

    public function findById($id) {
        return ProductCategory::findOrFail($id);
    }

    public function create($productCategory) {
        try {
            $productCategory->save();
        } catch(\Exception $e) {
            throw new \Exception(ResponseMessage::BDD_SAVE_ERROR);
        }
        return $productCategory;
    }

    public function update($productCategory) {
        try {
            $productCategory->update();
        } catch(\Exception $e) {
            throw new \Exception(ResponseMessage::BDD_UPDATE_ERROR);
        }
        return $productCategory;
    }


    public function listRootProductCategoriesByStateW($arrayOfStates) {
        return ProductCategory::whereNull('parent_id')
            ->with('children_categories')
            ->whereIn('state',$arrayOfStates)
            ->orderBy('name','asc')
            ->get();
    }

    public function listByParentStateW($idCategoryParent, $arrayOfStates) {
        return ProductCategory::where('parent_id','=',$idCategoryParent)
            ->with('children_categories')
            ->whereIn('state',$arrayOfStates)
            ->orderBy('name','asc')
            ->get();
    }
}
