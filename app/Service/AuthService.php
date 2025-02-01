<?php

namespace App\Service;

use App\Models\Auth;
use App\Repository\AuthRepository;

class AuthService
{
    public function __construct(private readonly AuthRepository $authRepository)
    {
    }

    public function requestOtp(string $mobile): Auth
    {
        return $this->authRepository->create($mobile);
    }

}
