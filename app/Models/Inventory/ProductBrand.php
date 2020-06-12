<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class ProductBrand extends Model
{
    protected $table = 'inv_product_brands';
    protected $primaryKey = 'product_brand_id';
    public $incrementing = true;

    
}
