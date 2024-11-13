<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UserService
{

    public function getToken(array $credentials): string
    {
        if (! $token = Auth::attempt($credentials)) {
            throw new AccessDeniedHttpException();
        }

        return $token;
    }
}
