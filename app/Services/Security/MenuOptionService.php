<?php

namespace App\Services\Security;

use App\Models\Security\MenuOption;
use App\Repositories\Security\MenuOptionRepository;

class MenuOptionService
{

    protected $menuOptionRepository;

    public function __construct(MenuOptionRepository $menuOptionRepository) {
        $this->menuOptionRepository = $menuOptionRepository;
    }

    public function getMenuTree($idMenuParent, $menu_tree, $nivel) {
        if ($idMenuParent == null) {
            $menus = $this->menuOptionRepository->listRootMenuOptionsByState(array('A','I'));
        } else {
            $menus = $this->menuOptionRepository->listByParentState($idMenuParent,array('A','I'));
        }

        if (!$menus->isEmpty()) {
            foreach ($menus as $menu) :
                $etiqueta = "<table class='menu_index_tree'><tr>";
                $etiqueta .= str_repeat('<td style="width: 2%;"></td>', $nivel);
                $etiqueta .= "<td>";
                $etiqueta = $menu->children_menu_option->count()>0 ? $etiqueta."<i class='fa fa-sort-down' ></i> " : $etiqueta;
                $etiqueta .= $menu->label."</td></tr></table>";
                $menu->label = $etiqueta;
                $menu_tree->push($menu);
                $menu_tree = $this->getMenuTree($menu->menu_id, $menu_tree, $nivel+1);
            endforeach;
        }

        return $menu_tree;
    }

    public function getMenuOptionSelectTree($idMenuParent, $menu_options_list, $nivel, $idSelectedMenu) {
        if ($idMenuParent == NULL) {
            $menus = $this->menuOptionRepository->listRootMenuOptionsByState(array('A','I'));
        } else {
            $menus = $this->menuOptionRepository->listByParentState($idMenuParent,array('A','I'));
        }

        if (!$menus->isEmpty()) {
            foreach ($menus as $menu) :
                $selected = '';

                if ($idSelectedMenu != NULL && $idSelectedMenu==$menu->menu_id):
                    $selected = 'selected="selected"';
                endif;

                $prefijoMenu = "";

                for ($i=1; $i<$nivel;$i++) :
                    $prefijoMenu .= str_repeat('&nbsp;', 10).' ';
                endfor;

                $prefijoMenu .= $menu->children_menu_option->count()>0 ? str_repeat('&nbsp;', 10).'> ' : str_repeat('&nbsp;', 10).' ';

                $menu_options_list = $menu_options_list
                    .'<option value="'.$menu->menu_id.'" '.$selected.' >'
                    .$prefijoMenu
                    .$menu->label
                    .'</option>';
                $menu_options_list = $this->getMenuOptionSelectTree($menu->menu_id, $menu_options_list, $nivel+1, $idSelectedMenu);
            endforeach;
        }

        return $menu_options_list;
    }

    public function findMenuByEncodedId($encodedId) {
        return $this->menuOptionRepository->findById(MenuOption::decode_id($encodedId));
    }

    public function getMenuOptionById($menuId) {
        return $this->menuOptionRepository->findById($menuId);
    }

    public function getMenuOptionByUrl($menuUrl) {
        return $this->menuOptionRepository->getByUrl($menuUrl);
    }

    public function createMenuOption($request) {
        $menu_option = new MenuOption();
        $menu_option->code = $request->code;
        $menu_option->label = $request->label;
        $menu_option->icon = $request->icon;
        $menu_option->url = $request->url;
        $menu_option->type = $request->type;
        $menu_option->state = $request->state;
        $menu_option->order = $request->order;
        if ($request->menu_parent_id != '0') {
            $menu_option->menu_parent_id = $request->menu_parent_id;
        } else {
            $menu_option->menu_parent_id = NULL;
        }
        return $this->menuOptionRepository->create($menu_option);
    }

    public function updateMenuOption($request) {
        $menu_option = $this->menuOptionRepository->findById($request->menu_id);
        $menu_option->label = $request->label;
        $menu_option->icon = $request->icon;
        $menu_option->url = $request->url;
        $menu_option->type = $request->type;
        $menu_option->state = $request->state;
        $menu_option->order = $request->order;
        if($request->menu_parent_id != '0') {
            $menu_option->menu_parent_id = $request->menu_parent_id;
        } else {
            $menu_option->menu_parent_id = NULL;
        }
        return $this->menuOptionRepository->update($menu_option);
    }

    public function deleteMenuOption($menuId) {
        // por definir lógica, validar si se deberian eliminar los menus hijos en caso de que los tenga
        // y si
        $menu_option = $this->menuOptionRepository->findById($menuId);
        $menu_option->state = 'E';
        return $this->menuOptionRepository->update($menu_option);
    }

    public function listActiveMenuOptionsTree($idMenuParent, $menu_tree, $nivel) {
        if ($idMenuParent == NULL) {
            $menus = $this->menuOptionRepository->listRootMenuOptionsByState(array('A','I'));
        } else {
            $menus = $this->menuOptionRepository->listByParentState($idMenuParent,array('A','I'));
        }

        if (!$menus->isEmpty()) {
            foreach ($menus as $menu) :
                $etiqueta = "";

                for ($i=1; $i<$nivel;$i++) :
                    $etiqueta .= str_repeat('&nbsp;', 5).' ';
                endfor;

                $etiqueta .= $menu->children_menu_option->count()>0 ? '&nbsp;<i class="fa fa-sort-down" ></i>&nbsp;' : ' ';

                $etiqueta .= $menu->label;
                $menu->label = $etiqueta;
                $menu_tree->push($menu);
                $menu_tree = $this->listActiveMenuOptionsTree($menu->menu_id, $menu_tree, $nivel+1);
            endforeach;
        }

        return $menu_tree;
    }

}