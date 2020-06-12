<?php

namespace App\Models\Security;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'sec_roles';
    protected $primaryKey = 'role_id';
    public $selected = false; //a default value

    /**
     * Get all of the user_role for the user.
     */
    public function role_menu_options()
    {
        return $this->hasMany('\App\Models\Security\RoleMenuOption', 'role_id');
    }

    /**
     * Get all of the user_role for the user.
     */
    public function active_role_menu_options()
    {
        return $this->hasMany('\App\Models\Security\RoleMenuOption', 'role_id')->where('state','A');
    }

    public function encoded_id() {
        return Role::getHashIdGenerator()->encode($this->role_id);
    }



    public static function getHashIdGenerator() {
        return new Hashids(Role::class, 10);
    }

    public static function decode_id($encodedid) {
        return Role::getHashIdGenerator()->decode($encodedid)[0];
    }
}
