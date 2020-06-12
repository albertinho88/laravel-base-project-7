<?php

namespace App\Models\Inventory;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductCategory extends Model
{
    protected $table = 'inv_product_categories';
    protected $primaryKey = 'product_category_id';
    public $incrementing = true;

    protected $active_children_categories;

    public function parent_category()
    {
        return $this->belongsTo('\App\Models\Inventory\ProductCategory', 'parent_id');
    }

    public function children_categories()
    {
        return $this->hasMany('\App\Models\Inventory\ProductCategory', 'parent_id', 'product_category_id');
    }    
    
    public function establishment_branch()
    {
        return $this->belongsTo('\App\Models\Security\EstablishmentBranch', 'establishment_branch_id');
    }

    public function active_products()
    {
        return $this->hasMany('\App\Models\Inventory\Product', 'product_category_id')->where('state','A');
    }


    public function encoded_id() {
        return ProductCategory::getHashIdGenerator()->encode($this->product_category_id);
    }


    public static function getHashIdGenerator() {
        return new Hashids(ProductCategory::class, 10);
    }

    public static function decode_id($encodedid) {
        return ProductCategory::getHashIdGenerator()->decode($encodedid)[0];
    }
}
