<?php

namespace App\Repositories\Security;

use App\Models\Security\Establishment;

class EstablishmentRepository
{
    public function getMainEstablishment() {
        return Establishment::firstOrfail();
    }
}