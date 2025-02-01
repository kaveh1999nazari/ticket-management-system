<?php

namespace App\Repository;

use App\Models\User;

class UsersRepository
{
    public function create(array $data)
    {
        return User::query()
            ->create([
                'mobile' => $data['mobile'],
                'meta' => json_encode([
                    'national_code' => $data['meta']['1'],
                    'birth_date' => $data['meta']['2'],
                    'first_name' => $data['meta']['3'] ?? null,
                    'last_name' => $data['meta']['4'] ?? null
                ]),
                'password' => '12345678',
            ]);
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
