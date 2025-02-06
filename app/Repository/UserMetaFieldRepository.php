<?php

namespace App\Repository;

use App\Models\UserMetaField;
use Illuminate\Database\Eloquent\Collection;

class UserMetaFieldRepository
{
    public function create(array $data): UserMetaField
    {
        return UserMetaField::query()
            ->create($data);
    }

    public function list(): Collection
    {
        return UserMetaField::query()
            ->get();
    }

    public function get(int $id): Collection|null
    {
        return UserMetaField::query()
            ->where('id', $id)
            ->first();
    }

    public function delete(int $id): int
    {
        return UserMetaField::query()
            ->where('id', $id)
            ->delete();
    }

}
