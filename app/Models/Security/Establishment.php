<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    protected $table = 'sec_establishments';
    protected $primaryKey = 'establishment_id';
    public $incrementing = true;
}
