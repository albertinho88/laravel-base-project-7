<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Hashids\Hashids;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'sec_users';
    protected $primaryKey = 'user_id';
    protected $menuOptionsPerUser;

    protected $isSuperAdmin = false;

    protected $generalState = '';
    protected $listOfRolesPerEstBranch = '';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function person()
    {
        return $this->belongsTo('\App\Models\Generic\Person', 'person_id');
    }

    /**
     * Get all of the user_role for the user.
     */
    public function users_roles()
    {
        return $this->hasMany('\App\Models\Security\UserRole', 'user_id');
    }

    public function user_establishment_branches() {
        return $this->hasMany('\App\Models\Security\UserEstablishmentBranch', 'user_id');
    }

    /**
     * Get all of the user_role for the user.
     */
    public function active_users_roles()
    {
        return $this->hasMany('\App\Models\Security\UserRole', 'user_id')->where('state','A');
    }

    public function active_user_establishment_branches() {
        return $this->hasMany('\App\Models\Security\UserEstablishmentBranch', 'user_id')->where('state','A');
    }

    public function encoded_id() {
        return User::getHashIdGenerator()->encode($this->user_id);
    }

    public static function getHashIdGenerator() {
        return new Hashids(User::class, 10);
    }

    public static function decode_id($encodedid) {
        return User::getHashIdGenerator()->decode($encodedid)[0];
    }
}
