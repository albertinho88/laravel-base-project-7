<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Model;

class UserEstablishmentBranch extends Model
{
    protected $table = 'sec_users_establishment_branches';
    protected $primaryKey = 'user_branch_id';


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
    public function establishment_branch()
    {
        return $this->belongsTo('\App\Models\Security\EstablishmentBranch', 'establishment_branch_id');
    }
}
