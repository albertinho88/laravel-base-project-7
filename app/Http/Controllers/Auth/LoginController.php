<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserLogged;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Security\SessionService;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::APP_HOME;
    protected $sessionService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SessionService $sessionService
    )
    {
        $this->middleware('guest')->except('logout');
        $this->sessionService = $sessionService;
    }

    public function showLoginForm()
    {
        return view('application.auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(LoginRequest $request)
    {

        try {
            // If the class is using the ThrottlesLogins trait, we can automatically throttle
            // the login attempts for this application. We'll key this by the username and
            // the IP address of the client making these requests into this application.
            if (method_exists($this, 'hasTooManyLoginAttempts') &&
                $this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);

                return $this->sendLockoutResponse($request);
            }

            $user = $this->sessionService->loginUserByEmail($request->email);

            if (!$this->attemptLogin($request)) {
                // If the login attempt was unsuccessful we will increment the number of attempts
                // to login and redirect the user back to the login form. Of course, when this
                // user surpasses their maximum number of attempts they will get locked out.
                $this->incrementLoginAttempts($request);

                throw new \Exception('Por favor revise sus credenciales y vuelva a intentar.');
            }

            event(new UserLogged($user));

            session(['is_superadmin' => $user->isSuperAdmin]);

            if (!$user->isSuperAdmin) {
                if ($user->active_user_establishment_branches->count() == 1) {
                    session(['establishment_branch_id' => $user->active_user_establishment_branches[0]->establishment_branch_id]);
                }
            }

            return $this->sendLoginResponse($request);

        } catch (\Exception $e) {
            return back()->withErrors([
                'general_message' => $e->getMessage()
            ]);
        }

    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }
}
