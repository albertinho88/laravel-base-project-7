<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'sec_users_per_roles';
    protected $primaryKey = 'user_role_id';


    /**
     * Get the user that owns the user_role.
     */
    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }

    /**
     * Get the role that owns the user_role.
     */
    public function role()
    {
        return $this->belongsTo('\App\Models\Security\Role', 'role_id');
    }
}
