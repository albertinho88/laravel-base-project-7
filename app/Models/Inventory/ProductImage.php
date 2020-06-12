<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    protected $table = 'inv_product_images';
    protected $primaryKey = 'productimage_id';
    public $incrementing = true;

    public function url() {
        return Storage::disk('products')->url($this->src);
    }

    public function thumb_url() {
        return Storage::disk('products_thumbs')->url($this->src);
    }
    
}
