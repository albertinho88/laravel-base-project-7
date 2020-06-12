<?php

namespace App\Models\Inventory;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $table = 'inv_products';
    protected $primaryKey = 'product_id';
    public $incrementing = true;

    protected $encoded_id;

    public function product_category()
    {
        return $this->belongsTo('\App\Models\Inventory\ProductCategory', 'product_category_id');
    }

    public function product_brand() 
    {
        return $this->belongsTo('\App\Models\Inventory\ProductBrand', 'product_brand_id');
    }

    public function product_images() 
    {
        return $this->hasMany('\App\Models\Inventory\ProductImage', 'product_id');
    }


    public function encoded_id() {
        return Product::getHashIdGenerator()->encode($this->product_id);
    }


    public static function getHashIdGenerator() {
        return new Hashids(Product::class, 10);
    }

    public static function decode_id($encodedid) {
        return Product::getHashIdGenerator()->decode($encodedid)[0];
    }
}
