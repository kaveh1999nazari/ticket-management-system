<?php

namespace App\Service;

use App\Exceptions\UserNotFound;
use App\Models\Auth;
use App\Repository\AuthRepository;
use App\Repository\UsersRepository;
use Illuminate\Http\JsonResponse;

class AuthService
{
    public function __construct(
        private readonly AuthRepository $authRepository,
        private readonly UsersRepository $usersRepository
    )
    {
    }

    public function requestOtp(string $mobile): Auth
    {
        return $this->authRepository->create($mobile);
    }

    public function confirmOtp(array $data): JsonResponse
    {
        $check = $this->usersRepository->checkExistMobile($data['mobile']);
        if ($check === false) {
            throw new UserNotFound();
        }

        $code = $this->authRepository->get($data);

        if ($code && $code->code === $data['code'] && $code->code_expired_at > now()) {
            $user = $this->usersRepository->get($data['mobile']);
            $token = auth('api')->login($user);
            return $this->respondWithToken($token);
        }else{
            return response()->json([
                'message' => 'کد وارد شده صحیح نمی باشد'
            ], 406);
        }
    }

    private function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

}
