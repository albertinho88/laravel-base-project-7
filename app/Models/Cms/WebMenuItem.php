<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class WebMenuItem extends Model
{
    protected $table = 'web_menu_items';
    protected $primaryKey = 'menu_item_id';
    public $incrementing = true;

    public $url = '#';

    
}
