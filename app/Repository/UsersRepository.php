<?php

namespace App\Repository;

use App\Exceptions\MetaFieldNotDefined;
use App\Models\User;
use App\Models\MetaField;

class UsersRepository
{
    public function create(array $data): User
    {
        return User::query()->create([
            'mobile' => $data['mobile'],
            'password' => '12345678',
        ]);
    }

    public function attachMeta(User $user, array $meta): void
    {
        $user->meta()
            ->createMany($meta);
    }

    public function checkExistMobile(string $mobile): bool
    {
        return User::query()
            ->where('mobile', $mobile)
            ->exists();
    }

    public function get(string $mobile)
    {
        return User::query()
            ->where('mobile', $mobile)
            ->first();
    }

}
