<?php

namespace App\Http\Middleware;

use Closure;

class CheckSelectedEstablishmentBranch
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $estBranchIsNotSelected = !session('is_superadmin') && !session('establishment_branch_id');

        if ($estBranchIsNotSelected) :
            return redirect('app/select_establishment_branch');
        else:
            return $next($request);
        endif;
    }
}
