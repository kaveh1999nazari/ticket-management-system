<?php

namespace App\Repository;

use App\Models\Auth;

class AuthRepository
{
    public function create(string $mobile): Auth
    {
        return Auth::query()
            ->updateOrCreate([
                'mobile' => $mobile,
            ],[
                'code' => rand(100000, 999999),
                'code_expired_at' => now()->addMinutes(3)
            ]);
    }

    public function get(array $data): Auth|null
    {
        return Auth::query()
            ->where('mobile', $data['mobile'])
            ->where('code', $data['code'])
            ->first();
    }

    public function update(array $data): int
    {
        return Auth::query()
            ->where('id', $data['id'])
            ->update([
                'token' => $data['token']
            ]);
    }
}
