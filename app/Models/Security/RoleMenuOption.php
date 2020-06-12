<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Model;

class RoleMenuOption extends Model
{
    protected $table = 'sec_roles_menu_options';
    protected $primaryKey = 'role_menu_id';

    /**
     * Get the user that owns the user_role.
     */
    public function menu_option()
    {
        return $this->belongsTo('\App\Models\Security\MenuOption', 'menu_id');
    }

    /**
     * Get the role that owns the user_role.
     */
    public function role()
    {
        return $this->belongsTo('\App\Models\Security\Role', 'role_id');
    }
}
