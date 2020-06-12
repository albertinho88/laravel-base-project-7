<?php

namespace App\Repositories\Cms;

use App\Models\Cms\WebMenu;

class WebMenuRepository
{
    public function listByState($arrayOfStates) {
        return WebMenu::whereIn('state', $arrayOfStates)
            ->orderBy('code', 'asc')
            ->get();
    }

    public function findById($id) {
        return WebMenu::findOrFail($id);
    }
    

    public function findByCode($menuCode) {
        return WebMenu::where('code',$menuCode)
            ->first();
    }
}
