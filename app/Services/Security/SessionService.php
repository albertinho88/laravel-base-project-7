<?php

namespace App\Services\Security;

class SessionService
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function loginUserByEmail($email) {

        $user = $this->userService->getUserByEmail($email);

        if (!$user || $user->state == 'E') {
            throw new \Exception("No existe un usuario registrado con la cuenta de correo ingresada.");
        }

        if ($user->state == 'I') {
            throw new \Exception('Su usuario se encuentra inactivo, por favor consulte con el Administrador.');
        }

        $user->isSuperAdmin = $this->userService->isSuperadminUser($user->user_id);

        if (!$user->isSuperAdmin && $user->active_user_establishment_branches->count() == 0) {
            throw new \Exception('Su usuario no se encuentra relacionado con ninguna sucursal del establecimiento.');
        }

        if(!$user->active_users_roles) {
            throw new \Exception('Su usuario no se encuentra relacionado con ningún Rol de Usuario.');
        }

        return $user;
    }

}

