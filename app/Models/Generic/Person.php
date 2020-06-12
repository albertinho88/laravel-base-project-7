<?php

namespace App\Models\Generic;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'sec_people';
    protected $primaryKey = 'person_id';
    public $incrementing = true;
}
