<?php

namespace App\Services\Inventory;

use App\Models\Inventory\ProductCategory;
use App\Repositories\Inventory\ProductCategoryRepository;
use Illuminate\Support\Facades\Storage;

class ProductCategoryService
{
    protected $productCategoryRepository;

    public function __construct(ProductCategoryRepository $productCategoryRepository)
    {
        $this->productCategoryRepository = $productCategoryRepository;
    }

    public function listAllProductCategories()
    {
        return ProductCategory::whereIn('state', array('A', 'I'))
            ->orderBy('code', 'asc')
            ->get();
    }

    public function getProductCategoriesTree($idCategoryParent, $categories_tree, $nivel, $sess_est_branch_id)
    {
        if ($idCategoryParent == null) {
            $categories = ProductCategory::whereNull('parent_id')
                ->whereIn('state', array('A', 'I'))
                ->where('establishment_branch_id', $sess_est_branch_id)
                ->orderBy('name', 'asc')
                ->get();
        } else {
            $categories = ProductCategory::where('parent_id', '=', $idCategoryParent)
                ->whereIn('state', array('A', 'I'))
                ->where('establishment_branch_id', $sess_est_branch_id)
                ->orderBy('name', 'asc')
                ->get();
        }

        if (!$categories->isEmpty()) {
            foreach ($categories as $category) :
                $etiqueta = "<table class='menu_index_tree'><tr>";
                $etiqueta .= str_repeat('<td style="width: 2%;"></td>', $nivel);
                $etiqueta .= "<td>";
                $etiqueta = $category->children_categories->count() > 0 ? $etiqueta . "<i class='fa fa-sort-down' ></i> " : $etiqueta;
                $etiqueta .= $category->name . "</td></tr></table>";
                $category->name = $etiqueta;
                $categories_tree->push($category);
                $categories_tree = $this->getProductCategoriesTree($category->product_category_id, $categories_tree, $nivel + 1, $sess_est_branch_id);
            endforeach;
        }

        return $categories_tree;
    }

    public function findProductCategoryById($productCategoryId)
    {
        return ProductCategory::findOrFail($productCategoryId);
    }

    public function findProductCategoryByEncodedId($encodedId)
    {
        return ProductCategory::findOrFail(ProductCategory::decode_id($encodedId));
    }

    public function getProductCategorySelectTree($idCategoryParent, $categories_list, $nivel, $idSelectedCategory, $sess_est_branch_id)
    {
        if ($idCategoryParent == NULL) {
            $categories = ProductCategory::whereNull('parent_id')
                ->whereIn('state', array('A', 'I'))
                ->where('establishment_branch_id', $sess_est_branch_id)
                ->orderBy('name', 'asc')
                ->get();
        } else {
            $categories = ProductCategory::where('parent_id', '=', $idCategoryParent)
                ->whereIn('state', array('A', 'I'))
                ->where('establishment_branch_id', $sess_est_branch_id)
                ->orderBy('name', 'asc')
                ->get();
        }

        if (!$categories->isEmpty()) {
            foreach ($categories as $category) :
                $selected = '';

                if ($idSelectedCategory != NULL && $idSelectedCategory == $category->product_category_id) :
                    $selected = 'selected="selected"';
                endif;

                $prefijoMenu = "";

                for ($i = 1; $i < $nivel; $i++) :
                    $prefijoMenu .= str_repeat('&nbsp;', 10) . ' ';
                endfor;

                $prefijoMenu .= $category->children_categories->count() > 0 ? str_repeat('&nbsp;', 10) . '> ' : str_repeat('&nbsp;', 10) . ' ';

                $categories_list = $categories_list
                    . '<option value="' . $category->product_category_id . '" ' . $selected . ' >'
                    . $prefijoMenu
                    . '(' . $category->code . ') ' . $category->name
                    . '</option>';
                $categories_list = $this->getProductCategorySelectTree($category->product_category_id, $categories_list, $nivel + 1, $idSelectedCategory, $sess_est_branch_id);
            endforeach;
        }

        return $categories_list;
    }

    public function createProductCategory($request, $sessEstBranchId)
    {
        //dropzone
        $product_category = new ProductCategory();
        $product_category->code = $request->code;
        $product_category->name = $request->name;
        $product_category->description = $request->description;
        //$product_category->image_path = $product_category->code . '/';
        $product_category->state = $request->state;
        $product_category->establishment_branch_id = $sessEstBranchId;

        if ($request->parent_id != '0') {
            $product_category->parent_id = $request->parent_id;
        } else {
            $product_category->parent_id = NULL;
        }

        $product_category = $this->productCategoryRepository->create($product_category);        

        return $product_category;
    }

    public function updateProductCategory($request)
    {
        $product_category = $this->productCategoryRepository->findById($request->product_category_id);
        $product_category->name = $request->name;
        $product_category->description = $request->description;
        $product_category->state = $request->state;

        if ($request->parent_id != '0') {
            $product_category->parent_id = $request->parent_id;
        } else {
            $product_category->parent_id = NULL;
        }

        return $this->productCategoryRepository->update($product_category);
    }


    // =============================== WEBSITE FUNCTIONS =========================================

    /**
     * Método para generar el menú lateral de la sección de catálogo de
     * productos del sitio web
     */
    public function generateProductCategoriesSidebarTree($idCategoryParent, $categories_tree)
    {
        if ($idCategoryParent == null) {
            $categories = $this->productCategoryRepository->listRootProductCategoriesByState(array('A'));
        } else {
            $categories = $this->productCategoryRepository->listByParentState($idCategoryParent, array('A'));
        }

        if (!$categories->isEmpty()) {
            $categories_tree .= "<ul>";
            foreach ($categories as $category) :
                $categories_tree .= "<li>";
                $categories_tree .= '<a href="' .
                    route(
                        'show_site_category',
                        [
                            'product_category_id' => ProductCategory::getHashIdGenerator()->encode($category->product_category_id)
                        ]
                    )
                    . '">';
                $categories_tree .= '' . $category->name;
                $categories_tree .= "</a>";
                $categories_tree = $this->generateProductCategoriesSidebarTree($category->product_category_id, $categories_tree);
                $categories_tree .= "</li>";
            endforeach;
            $categories_tree .= "</ul>";
        }

        return $categories_tree;
    }

    public function getActiveProductCategoriesTree($idCategoryParent)
    {
        $categoriesTree = collect();

        if ($idCategoryParent == null) {
            $categories = $this->productCategoryRepository->listRootProductCategoriesByStateW(array('A'));
        } else {
            $categories = $this->productCategoryRepository->listByParentStateW($idCategoryParent, array('A'));
        }

        if (!$categories->isEmpty()) {
            foreach ($categories as $category) :
                $category->active_children_categories = $this->getActiveProductCategoriesTree($category->product_category_id);
                $categoriesTree->push($category);
            endforeach;
        }

        return $categoriesTree;
    }
}
