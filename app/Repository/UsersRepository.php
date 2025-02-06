<?php

namespace App\Repository;

use App\Exceptions\MetaFieldNotDefined;
use App\Models\User;
use App\Models\UserMetaField;

class UsersRepository
{
    public function create(array $data)
    {
        $meta = $data['meta'] ?? [];

        $validMeta = [];
        foreach ($meta as $key => $value) {
            if (!UserMetaField::where('meta_key', $key)->exists()) {
                throw new MetaFieldNotDefined($key);
            }

            $validMeta[$key] = $value;
        }

        $user = User::query()
            ->create([
            'mobile' => $data['mobile'],
            'meta' => json_encode($validMeta),
            'password' => '12345678',
        ]);

        foreach ($validMeta as $key => $value) {
            $user->meta()->create([
                'meta_key' => $key,
                'meta_value' => json_encode($value),
            ]);
        }

        return $user;
    }

    public function get(string $mobile)
    {
        return User::query()
            ->where('mobile', $mobile)
            ->first();
    }
    public function checkExistMobile(string $mobile): bool
    {
        return User::query()
            ->where('mobile', $mobile)
            ->exists();
    }

}
