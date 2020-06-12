<?php

namespace App\Models\Security;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;

class MenuOption extends Model
{
    protected $table = 'sec_menu_options';
    protected $primaryKey = 'menu_id';
    public $selected = ''; //a default value
    public $level = 0;

    /**
     * Get the user that owns the user_role.
     */
    public function parent_menu_option()
    {
        return $this->belongsTo('\App\Models\Security\MenuOption', 'menu_parent_id');
    }

    /**
     * Get the user that owns the user_role.
     */
    public function children_menu_option()
    {
        return $this->hasMany('\App\Models\Security\MenuOption', 'menu_parent_id', 'menu_id');
    }

    public function encoded_id() {
        return MenuOption::getHashIdGenerator()->encode($this->menu_id);
    }



    public static function getHashIdGenerator() {
        return new Hashids(MenuOption::class, 10);
    }

    public static function decode_id($encodedid) {
        return MenuOption::getHashIdGenerator()->decode($encodedid)[0];
    }
}
