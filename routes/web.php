<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ========================= WEBSITE ==========================

Route::get('/', 'SiteController@viewHome')->name('home');
Route::get('page/{page_id}', 'SiteController@viewPage')->name('show_site_page');
Route::get('catalog', 'SiteController@viewCatalog')->name('show_catalog');
Route::get('catalog/category/{product_category_id}', 'SiteController@viewProductCategory')->name('show_site_category');
Route::get('listProductCategories/{product_category_id}','SiteController@listProductCategories');
Route::get('listProductBrands','SiteController@listProductBrands');
Route::post('listProductsByFilters','SiteController@listProductsByFilters');
Route::get('product/{product_encoded_id}', 'SiteController@showProduct')->name('show_site_product');
Route::get('product_quick_view', 'SiteController@viewProductDialog');


Route::get('app/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('app/login', 'Auth\LoginController@login')->name('signin');
Route::get('app/logout', 'Auth\LoginController@logout')->name('logout');

Route::fallback(function () {
    return redirect()->route('home');
});


// ============================= APP ===============================

Route::group(['middleware' => ['auth']], function () {

    Route::get('app/select_establishment_branch','AppController@viewEstablishmentBranchSelection')->name('select_establishment_branch');
    Route::post('app/select_establishment_branch','AppController@selectEstablishmentBranch')->name('store_establishment_branch_selection');

    Route::group(['middleware' => ['isEstablishmentBranchSelected']], function () {
        Route::get('app','AppController@principal')->name('application_principal');

        Route::get('app/profile/edit_user_info','AppController@editUserInfo')->name('edit_user_info');
        Route::post('app/profile/edit_user_info','AppController@updateUserInfo')->name('update_user_info');

        Route::get('app/edit_password','AppController@editPassword')->name('edit_password');
        Route::post('app/edit_password','AppController@updatePassword')->name('update_password');


        // ============ MÓDULO ESTABLECIMIENTO =======================

        Route::group(['middleware' => ['hasAccess']], function () {
            Route::get('app/establishment', function() {
                return view('application.establishment.main');
            })->name('establishment');

            Route::get('app/establishment/establishment_branches','Security\EstablishmentBranchController@index')->name('index_establishment_branches');
            Route::get('app/establishment/establishment_branches/create','Security\EstablishmentBranchController@create')->name('create_establishment_branch');
            Route::post('app/establishment/establishment_branches/create','Security\EstablishmentBranchController@store')->name('store_establishment_branch');
            Route::get('app/establishment/establishment_branches/edit/{establishment_branch_id}','Security\EstablishmentBranchController@edit')->name('edit_establishment_branch');
            Route::get('app/establishment/establishment_branches/show/{establishment_branch_id}','Security\EstablishmentBranchController@show')->name('show_establishment_branch');
            Route::get('app/establishment/establishment_branches/remove/{establishment_branch_id}','Security\EstablishmentBranchController@remove')->name('remove_establishment_branch');
        });

        Route::post('app/establishment/establishment_branches/create_pre_validation','Security\EstablishmentBranchController@preValidateStore')->name('store_establishment_branch_pre_validation')
            ->middleware('hasAccessOptional:app/establishment/establishment_branches/create');
        Route::post('app/establishment/establishment_branches/update_pre_validation','Security\EstablishmentBranchController@preValidateUpdate')->name('update_establishment_branch_pre_validation')
            ->middleware('hasAccessOptional:app/establishment/establishment_branches/edit/{establishment_branch_id}');
        Route::post('app/establishment/establishment_branches/update','Security\EstablishmentBranchController@update')->name('update_establishment_branch')
            ->middleware('hasAccessOptional:app/establishment/establishment_branches/edit/{establishment_branch_id}');



        // ============ MÓDULO SEGURIDADES =======================

        Route::group(['middleware' => ['hasAccess']], function () {

            Route::get('app/security', function() {
                return view('application.security.main');
            })->name('security');

            Route::get('app/security/menu_options','Security\MenuOptionController@index')->name('index_menu_options');
            Route::get('app/security/menu_options/create','Security\MenuOptionController@create')->name('create_menu_option');
            Route::post('app/security/menu_options/create','Security\MenuOptionController@store')->name('store_menu_option');
            Route::get('app/security/menu_options/edit/{menu_id}','Security\MenuOptionController@edit')->name('edit_menu_option');
            Route::get('app/security/menu_options/show/{menu_id}','Security\MenuOptionController@show')->name('show_menu_option');
            Route::get('app/security/menu_options/remove/{menu_id}','Security\MenuOptionController@remove')->name('remove_menu_option');

            Route::get('app/security/roles','Security\RoleController@index')->name('index_roles');
            Route::get('app/security/roles/create','Security\RoleController@create')->name('create_role');
            Route::post('app/security/roles/create','Security\RoleController@store')->name('store_role');
            Route::get('app/security/roles/edit/{role_id}','Security\RoleController@edit')->name('edit_role');
            Route::get('app/security/roles/show/{role_id}','Security\RoleController@show')->name('show_role');

            Route::get('app/security/users','Security\UserController@index')->name('index_users');
            Route::get('app/security/users/create','Security\UserController@create')->name('create_user');
            Route::post('app/security/users/create','Security\UserController@store')->name('store_user');
            Route::get('app/security/users/edit/{user_id}','Security\UserController@edit')->name('edit_user');
            Route::get('app/security/users/show/{user_id}','Security\UserController@show')->name('show_user');

        });

        Route::post('app/security/menu_options/create_pre_validation','Security\MenuOptionController@preValidateStore')->name('store_menu_option_pre_validation')
            ->middleware('hasAccessOptional:app/security/menu_options/create');
        Route::post('app/security/menu_options/update_pre_validation','Security\MenuOptionController@preValidateUpdate')->name('update_menu_option_pre_validation')
            ->middleware('hasAccessOptional:app/security/menu_options/edit/{menu_id}');
        Route::post('app/security/menu_options/update','Security\MenuOptionController@update')->name('update_menu_option')
            ->middleware('hasAccessOptional:app/security/menu_options/edit/{menu_id}');
        Route::post('app/security/menu_options/delete','Security\MenuOptionController@delete')->name('delete_menu_option')
            ->middleware('hasAccessOptional:app/security/menu_options/remove/{menu_id}');

        Route::post('app/security/roles/create_pre_validation','Security\RoleController@preValidateStore')->name('store_role_pre_validation')
            ->middleware('hasAccessOptional:app/security/roles/create');
        Route::post('app/security/roles/update_pre_validation','Security\RoleController@preValidateUpdate')->name('update_role_pre_validation')
            ->middleware('hasAccessOptional:app/security/roles/edit/{role_id}');
        Route::post('app/security/roles/update','Security\RoleController@update')->name('update_role')
            ->middleware('hasAccessOptional:app/security/roles/edit/{role_id}');

        Route::post('app/security/users/create_pre_validation','Security\UserController@preValidateStore')->name('store_user_pre_validation')
            ->middleware('hasAccessOptional:app/security/users/create');
        Route::post('app/security/users/update_pre_validation','Security\UserController@preValidateUpdate')->name('update_user_pre_validation')
            ->middleware('hasAccessOptional:app/security/users/edit/{user_id}');
        Route::post('app/security/users/update','Security\UserController@update')->name('update_user')
            ->middleware('hasAccessOptional:app/security/users/edit/{user_id}');



        // ============================== MÓDULO DE INVENTARIO =====================================

        Route::group(['middleware' => ['hasAccess']], function () {

            Route::get('app/inventory', function() {
                return view('application.inventory.main');
            })->name('inventory');

            Route::get('app/inventory/product_categories','Inventory\ProductCategoryController@index')->name('index_product_categories');
            Route::get('app/inventory/product_categories/create','Inventory\ProductCategoryController@create')->name('create_product_category');
            Route::post('app/inventory/product_categories/create','Inventory\ProductCategoryController@store')->name('store_product_category');
            Route::get('app/inventory/product_categories/edit/{product_category_id}','Inventory\ProductCategoryController@edit')->name('edit_product_category');
            Route::get('app/inventory/product_categories/show/{product_category_id}','Inventory\ProductCategoryController@show')->name('show_product_category');

            Route::get('app/inventory/products','Inventory\ProductController@index')->name('index_products');
            Route::get('app/inventory/products/create','Inventory\ProductController@create')->name('create_product');
            Route::post('app/inventory/products/create','Inventory\ProductController@store')->name('store_product');
            Route::get('app/inventory/products/edit/{product_id}','Inventory\ProductController@edit')->name('edit_product');
            Route::get('app/inventory/products/show/{product_id}','Inventory\ProductController@show')->name('show_product');
            Route::get('app/inventory/products/manage_images/{product_id}','Inventory\ProductController@manageImages')->name('manage_product_images');
        });

        Route::post('app/inventory/product_categories/update','Inventory\ProductCategoryController@update')->name('update_product_category')
            ->middleware('hasAccessOptional:app/inventory/product_categories/edit/{product_category_id}');
        Route::post('app/security/product_categories/create_pre_validation','Inventory\ProductCategoryController@preValidateStore')->name('store_product_category_pre_validation')
            ->middleware('hasAccessOptional:app/inventory/product_categories/create');
        Route::post('app/security/product_categories/update_pre_validation','Inventory\ProductCategoryController@preValidateUpdate')->name('update_product_category_pre_validation')
            ->middleware('hasAccessOptional:app/inventory/product_categories/edit/{product_category_id}');

        Route::post('app/inventory/products/update','Inventory\ProductController@update')->name('update_product')
            ->middleware('hasAccessOptional:app/inventory/products/edit/{product_id}');
        Route::post('app/security/products/create_pre_validation','Inventory\ProductController@preValidateStore')->name('store_product_pre_validation')
            ->middleware('hasAccessOptional:app/inventory/products/create');
        Route::post('app/security/products/update_pre_validation','Inventory\ProductController@preValidateUpdate')->name('update_product_pre_validation')
            ->middleware('hasAccessOptional:app/inventory/products/edit/{product_id}');        
        Route::post('app/inventory/products/delete_image','Inventory\ProductController@deleteProductImage')->name('delete_product_image')
            ->middleware('hasAccessOptional:app/inventory/products/manage_images/{product_id}');            
        Route::post('app/inventory/products/upload_image_pre_validation','Inventory\ProductController@preValidateUploadProductImage')->name('upload_productimg_pre_validation')
            ->middleware('hasAccessOptional:app/inventory/products/manage_images/{product_id}');
        Route::post('app/inventory/products/upload_image','Inventory\ProductController@uploadProductImage')->name('upload_product_image')
            ->middleware('hasAccessOptional:app/inventory/products/manage_images/{product_id}');




        // ============================== MÓDULO CMS SITIO WEB =====================================

        Route::group(['middleware' => ['hasAccess']], function () {

            Route::get('app/cms', function() {
                return view('application.cms.main');
            })->name('cms');

            Route::get('app/cms/web_menus','Cms\WebMenuController@index')->name('index_web_menus');
            Route::get('app/cms/web_menus/create','Cms\WebMenuController@create')->name('create_web_menu');
            Route::post('app/cms/web_menus/create','Cms\WebMenuController@store')->name('store_web_menu');
            Route::get('app/cms/web_menus/edit/{menu_id}','Cms\WebMenuController@edit')->name('edit_web_menu');
            Route::get('app/cms/web_menus/show/{menu_id}','Cms\WebMenuController@show')->name('show_web_menu');

        });

        Route::post('app/cms/web_menus/create_pre_validation','Cms\WebMenuController@preValidateStore')->name('store_web_menu_pre_validation')
            ->middleware('hasAccessOptional:app/cms/web_menus/create');
        Route::post('app/cms/web_menus/update_pre_validation','Cms\WebMenuController@preValidateUpdate')->name('update_web_menu_pre_validation')
            ->middleware('hasAccessOptional:app/cms/web_menus/edit/{menu_id}');
        Route::post('app/cms/web_menus/update','Cms\WebMenuController@update')->name('update_web_menu')
            ->middleware('hasAccessOptional:app/cms/web_menus/edit/{menu_id}');

    });

});

Route::get('errors/no_menu_access', function() {
    return view('errors.no_menu_access');
});
