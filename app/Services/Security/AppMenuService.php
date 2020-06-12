<?php

namespace App\Services\Security;

use App\Repositories\Security\MenuOptionRepository;

class AppMenuService
{
    protected $menuOptionRepository;

    public function __construct(MenuOptionRepository $menuOptionRepository) {
        $this->menuOptionRepository = $menuOptionRepository;
    }

    public function getHtmlMenuTree($idMenuParent, $selectedMenuPath, $idUser, $idEstBranch, $isSuperadmin) {

        $menus = null;

        if ($idMenuParent == null) {
            $menus = $this->menuOptionRepository->listRootMenuOptions($idUser, $idEstBranch, $isSuperadmin);
        } else {
            $menus = $this->menuOptionRepository->listChildrenMenuOptionsByUser($idUser, $idMenuParent, $idEstBranch, $isSuperadmin);
        }

        if (!$menus->isEmpty()) :
            $menu_tree = '';

            foreach ($menus as $menu) :

                $children_menu_option = $this->getHtmlMenuTree($menu->menu_id, $selectedMenuPath, $idUser, $idEstBranch, $isSuperadmin);
                $has_children_menu_selected = $this->hasChildrenMenuSelected($menu->menu_id, $selectedMenuPath);

                $menu_tree .= '<li class="nav-item ';
                $menu_tree .= $has_children_menu_selected || $menu->url == $selectedMenuPath ? ' open ':' ';
                $menu_tree .= $children_menu_option != null ? ' nav-dropdown ':' ';
                $menu_tree .= '" >';

                if ($children_menu_option != null):
                    $menu_tree .= '<a href="'.url($menu->url).'" class="nav-link nav-dropdown-toggle">
                                    <i class="nav-icon '.$menu->icon.'"></i>
                                    '.$menu->label.'
                                    </a>';
                    $menu_tree .= '<ul class="nav-dropdown-items" ';
                    $menu_tree .= $has_children_menu_selected?'style="display: block;" ':' ';
                    $menu_tree .= '>'.$children_menu_option.'</ul></li>';
                else:
                    $menu_tree .= '<a class="nav-link" href="'.url($menu->url).'" >
                                    <i class="nav-icon '.$menu->icon.'"></i>
                                    '.$menu->label.'</a>';
                    $menu_tree .= '</li>';
                endif;

            endforeach;

            return $menu_tree;
        else :
            return null;
        endif;
    }

    public function hasChildrenMenuSelected($idMenu, $selectedPath) {

        $children = $this->menuOptionRepository->listChildrenMenuOptions($idMenu);

        if (!$children->isEmpty()) :
            foreach($children as $men):
                if ($men->url == $selectedPath || $this->hasChildrenMenuSelected($men->menu_id, $selectedPath)) :
                    return true;
                endif;
            endforeach;
        endif;

        return false;
    }

    public function hasMenuAccess($userId, $url, $idEstBranch) {
        $menuOption = $this->menuOptionRepository->getMenuAccessByUserUrlEstablishment($userId, $url, $idEstBranch);
        return !$menuOption->isEmpty();
    }
}