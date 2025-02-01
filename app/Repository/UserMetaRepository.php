<?php

namespace App\Repository;

use App\Models\UserMeta;
use Illuminate\Database\Eloquent\Collection;

class UserMetaRepository
{
    public function create(array $data): UserMeta
    {
        return UserMeta::query()
            ->create($data);
    }

    public function list(): Collection
    {
        return UserMeta::query()
            ->get();
    }

    public function get(int $id): Collection|null
    {
        return UserMeta::query()
            ->where('id', $id)
            ->first();
    }

    public function delete(int $id): int
    {
        return UserMeta::query()
            ->where('id', $id)
            ->delete();
    }

}
