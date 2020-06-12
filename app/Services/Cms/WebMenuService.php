<?php

namespace App\Services\Cms;

use App\Enums\WebMenuItemType;
use App\Models\Cms\WebMenu;
use App\Models\Inventory\ProductCategory;
use App\Repositories\Cms\WebMenuRepository;

class WebMenuService
{
    protected $webMenuRepository;

    public function __construct(WebMenuRepository $webMenuRepository) {
        $this->webMenuRepository = $webMenuRepository;        
    }

    public function listAllWebMenus()
    {
        return $this->webMenuRepository->listByState(array('A', 'I'));
    }

    public function findWebMenuById($webMenuId)
    {
        return $this->webMenuRepository->findById($webMenuId);
    }

    public function findWebMenuByEncodedId($encodedId)
    {
        return $this->webMenuRepository->findById(WebMenu::decode_id($encodedId));
    }

    public function updateWebMenu($request) {

    }



    // ================================ WebSite Functions =====================================

    public function getWebMenuByCode($menuCode) {
        $menu = $this->webMenuRepository->findByCode($menuCode);
        
        if(isset($menu->active_menu_items)) { 
            foreach($menu->active_menu_items as $item) {
                if ($item->menu_type == WebMenuItemType::PAGE) {
                    $item->url = route('show_site_page',['page_id' => $item->page_id]);
                } else if ($item->menu_type == WebMenuItemType::PRODUCT_CATEGORY) {
                    $item->url = route(
                        'show_site_category',
                        [
                            'product_category_id' => ProductCategory::getHashIdGenerator()->encode($item->product_category_id)
                        ]
                    );
                }
            }  
        }      

        return $menu;
    }
}
