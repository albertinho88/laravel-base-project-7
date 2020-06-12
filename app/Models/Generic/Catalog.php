<?php

namespace App\Models\Generic;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $table = 'gen_catalogs';
    protected $primaryKey = 'catalog_id';
    public $incrementing = false;
}
