<?php

namespace App\Http\Controllers;

use App\Enums\ResponseMessage;
use App\Enums\ResponseType;
use App\Http\Requests\ChangePasswordRequest;
use App\Services\Security\EstablishmentService;
use App\Services\Security\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AppController extends Controller
{
    protected $userService;
    protected $establishmentService;

    public function __construct(UserService $userService, EstablishmentService $establishmentService)
    {
        $this->userService = $userService;
        $this->establishmentService = $establishmentService;
    }

    // ==================== VIEW METHODS =====================

    public function principal()
    {
        try {
            $establishmentBranch = $this->establishmentService->getEstablishmentBranchById(session('establishment_branch_id'));
        } catch (\Exception $e) {
            $establishmentBranch = null;
        }

        return view('application.principal',compact('establishmentBranch'));
    }

    public function viewEstablishmentBranchSelection()
    {
        $user = $this->userService->findUserById(auth()->user()->user_id);
        return view('application.estbranchselection', compact('user'));
    }

    public function editUserInfo() {
        $user = $this->userService->findUserById(auth()->user()->user_id);
        return view('application._profile.edit_user_info',compact('user'));
    }

    public function editPassword() {
        $user = $this->userService->findUserById(auth()->user()->user_id);
        return view('application._profile.change_password',compact('user'));
    }


    // ==================== ACTION METHODS =====================

    public function selectEstablishmentBranch(Request $request) {

        try {

            if (!isset($request->establishment_branches_radio)) {
                throw new \Exception('Por favor seleccione una sucursal.');
            }

            session(['establishment_branch_id' => $request->establishment_branches_radio]);
            return redirect('app');

        } catch (\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        }

    }

    public function updateUserInfo(Request $request) {

        $this->validate(request(), [
            'name' => 'required'
        ]);

        try {
            $this->userService->updateUserPersonalInfo($request);
            return redirect()
                ->route('application_principal')
                ->with('success_message', ResponseMessage::SUCCESSFUL_SUBMIT);
        } catch(\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function updatePassword(ChangePasswordRequest $request) {

        try {
            $this->userService->updateUserPassword($request);
            return redirect()
                ->route('application_principal')
                ->with('success_message',ResponseMessage::SUCCESSFUL_SUBMIT);
        } catch(\Exception $e) {
            return back()->withErrors([
                'error_message' => $e->getMessage()
            ]);
        }
    }
}
