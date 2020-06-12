<?php

namespace App\Models\Security;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;

class EstablishmentBranch extends Model
{
    protected $table = 'sec_establishment_branches';
    protected $primaryKey = 'establishment_branch_id';
    public $incrementing = true;

    public function establishment()
    {
        return $this->belongsTo('\App\Models\Security\Establishment', 'establishment_id');
    }

    public function encoded_id() {
        return EstablishmentBranch::getHashIdGenerator()->encode($this->establishment_branch_id);
    }



    public static function getHashIdGenerator() {
        return new Hashids(EstablishmentBranch::class, 10);
    }

    public static function decode_id($encodedid) {
        return EstablishmentBranch::getHashIdGenerator()->decode($encodedid)[0];
    }
}
