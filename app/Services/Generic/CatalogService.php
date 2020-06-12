<?php

namespace App\Services\Generic;

use App\Models\Generic\CatalogDetail;

class CatalogService
{
    public function listActiveDetailsByCatalog($idCatalog) {
        return CatalogDetail::where('catalog_id',$idCatalog)
            ->where('state','A')
            ->orderBy('value','asc')
            ->get();
    }
}
