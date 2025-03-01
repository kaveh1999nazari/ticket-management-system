<?php

namespace App\Service;

use App\Exceptions\NotFoundNotificationType;
use App\Exceptions\UserNotFound;
use App\Models\Auth;
use App\Notifications\UserLoggedInNotification;
use App\Repository\AuthRepository;
use App\Repository\UsersRepository;
use Illuminate\Http\JsonResponse;
use Kaveh\NotificationService\Services\NotificationService;

class AuthService
{
    public function __construct(
        private readonly AuthRepository $authRepository,
        private readonly UsersRepository $usersRepository,
    )
    {
    }

    public function requestOtp(string $mobile): Auth
    {
        return $this->authRepository->create($mobile);
    }

    /**
     * @throws NotFoundNotificationType
     * @throws UserNotFound
     * @throws \Kaveh\NotificationService\Exceptions\NotFoundNotificationType
     */
    public function confirmOtp(array $data): JsonResponse
    {
        $check = $this->usersRepository->checkExistMobile($data['mobile']);
        if ($check === false) {
            throw new UserNotFound();
        }

        $auth = $this->authRepository->get($data);

        if ($auth && $auth->code === $data['code'] && $auth->code_expired_at > now()) {
            $user = $this->usersRepository->get($data['mobile']);
            $token = auth('api')->login($user);
            $this->authRepository->update([
                'id' => $auth->id,
                'token' => $token
            ]);
            NotificationService::sendNotification(UserLoggedInNotification::class, $user, 1);
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
