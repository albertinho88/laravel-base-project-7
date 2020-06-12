<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
     /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // GENERATE MAIN WEBSITE MENU
        view()->composer('partial.header_website', function ($view) {
            $webMenuService = $this->app->make('App\Services\Cms\WebMenuService');
            $main_website_menu = $webMenuService->getWebMenuByCode('main_website_menu');
            $view->with('main_website_menu', $main_website_menu);
        });

        // GENERATE MENU PER USER
        view()->composer('application._partial.sidebar', function ($view) {
            if (auth()->check()) :
                $appMenuService = $this->app->make('App\Services\Security\AppMenuService');
                $view->with(
                    'menu_left_per_user',
                    $appMenuService->getHtmlMenuTree(
                        null,
                        Route::current()->uri(),
                        auth()->user()->user_id,
                        session('establishment_branch_id'),
                        session('is_superadmin')
                    )
                );
            endif;
        });

        // GENERATE BREADCRUMB PER OPTION
        view()->composer('application._partial.breadcrumb', function ($view) {
            $menuOptionService = $this->app->make('App\Services\Security\MenuOptionService');
            $menu_option_active =  $menuOptionService->getMenuOptionByUrl(Route::current()->uri());
            if (isset($menu_option_active)) {
                $breadcrumb = '<li class="breadcrumb-item active">' . $menu_option_active->label . '</li>';
                $view->with('breadcrumb', $this->generateBreadcrumb($menu_option_active->menu_parent_id, $breadcrumb));
            }
        });

        // GENERATE TITLE PER OPTION
        view()->composer('application.*', function ($view) {
            $menuOptionService = $this->app->make('App\Services\Security\MenuOptionService');
            $menu_option_active =  $menuOptionService->getMenuOptionByUrl(Route::current()->uri());
            if (isset($menu_option_active)) {
                $view->with('option_title', $menu_option_active->label);
            }
        });
    }

    public function generateBreadcrumb($menu_parent_id, $breadcrumb)
    {
        $menuOptionService = $this->app->make('App\Services\Security\MenuOptionService');

        try {
            $menop = $menuOptionService->getMenuOptionById($menu_parent_id);
        } catch (\Exception $e) {
            $menop = null;
        }
        if ($menop == null) {
            return $breadcrumb;
        }

        $newcrum = '<li class="breadcrumb-item"><a href="' . url($menop->url) . '">' . $menop->label . '</a></li>';
        return $this->generateBreadcrumb($menop->menu_parent_id, $newcrum . $breadcrumb);
    }
}
