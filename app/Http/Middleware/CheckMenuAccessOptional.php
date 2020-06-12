<?php

namespace App\Http\Middleware;

use App\Services\Security\AppMenuService;
use Closure;

class CheckMenuAccessOptional
{
    protected $appMenuService;

    public function __construct(AppMenuService $appMenuService)
    {
        $this->appMenuService = $appMenuService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $path)
    {
        $hasAccess = $this->appMenuService->hasMenuAccess(
            $request->user()->user_id,
            $path,
            session('establishment_branch_id'));

        if ($hasAccess) :
            return $next($request);
        else:
            return redirect('errors/no_menu_access');
        endif;
    }
}
