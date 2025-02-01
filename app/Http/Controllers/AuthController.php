<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthConfirmOtpRequest;
use App\Http\Requests\AuthRequestOtpRequest;
use App\Service\AuthService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthController
{
    public function __construct(private readonly AuthService $authService)
    {
    }

    public function requestOtp(AuthRequestOtpRequest $request): JsonResponse
    {
        $otpRequest = $this->authService->requestOtp($request->validated()['mobile']);

        return response()->json([
            'code' => $otpRequest->code
        ]);
    }

    public function confirmOtp(Request $request): JsonResponse
    {
        return $this->authService->confirmOtp($request->only('mobile', 'code'));
    }
}
