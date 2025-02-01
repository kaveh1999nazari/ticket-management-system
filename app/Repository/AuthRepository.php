<?php

namespace App\Repository;

use App\Models\Auth;
use App\Models\User;

class AuthRepository
{
    public function create(string $mobile): Auth
    {
        return Auth::query()
            ->create([
                'mobile' => $mobile,
                'code' => rand(100000, 999999),
                'code_expired_at' => now()->addMinutes(3)
            ]);
    }

    public function get(array $data): Auth
    {
        return Auth::query()
            ->where('mobile', $data['mobile'])
            ->where('code', $data['code'])
            ->first();
    }
}
