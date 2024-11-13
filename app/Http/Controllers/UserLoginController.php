<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;


class UserLoginController extends Controller
{
    public function __construct(protected UserService $userService)
    {  
    }

    public function login(UserLoginRequest $request): JsonResponse
    {
        $token = $this->userService->getToken($request->validated());

        return response()->json([
            'token'  => $token,
            'status' => 'APPROVED',
        ]);
    }
}
