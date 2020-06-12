<?php

namespace App\Models\Generic;

use Illuminate\Database\Eloquent\Model;

class CatalogDetail extends Model
{
    protected $table = 'gen_catalog_details';
    protected $primaryKey = 'catalogdetail_id';
    public $incrementing = false;
}
