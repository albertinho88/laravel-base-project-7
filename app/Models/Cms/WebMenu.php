<?php

namespace App\Models\Cms;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;

class WebMenu extends Model
{
    protected $table = 'web_menus';
    protected $primaryKey = 'menu_id';
    public $incrementing = true;

    public function active_menu_items()
    {
        return $this->hasMany('\App\Models\Cms\WebMenuItem', 'menu_id')->where('state','A');
    }

    public function encoded_id() {
        return WebMenu::getHashIdGenerator()->encode($this->menu_id);
    }

    public static function getHashIdGenerator() {
        return new Hashids(WebMenu::class, 10);
    }

    public static function decode_id($encodedid) {
        return WebMenu::getHashIdGenerator()->decode($encodedid)[0];
    }
}
