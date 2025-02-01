<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequestOtpRequest;
use App\Http\Requests\UserCreateRequest;
use App\Service\UsersService;
use Illuminate\Http\JsonResponse;

class UsersController extends  Controller
{
    public function __construct(
        private readonly UsersService $usersService
    )
    {
    }

    public function register(UserCreateRequest $request): JsonResponse
    {
        $user = $this->usersService->register($request->validated());
        return response()->json($user);
    }

}
