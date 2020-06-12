<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Model;

class LoginEvent extends Model
{
    protected $table = 'sec_login_events';
    protected $primaryKey = 'loginevent_id';



}
