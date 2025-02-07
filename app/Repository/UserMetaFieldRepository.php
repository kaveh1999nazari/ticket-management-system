<?php

namespace App\Repository;

use App\Models\MetaField;
use Illuminate\Database\Eloquent\Collection;

class UserMetaFieldRepository
{
    public function create(array $data): MetaField
    {
        return MetaField::query()
            ->create($data);
    }

    public function list(): Collection
    {
        return MetaField::query()
            ->get();
    }

    public function get(int $id): Collection|null
    {
        return MetaField::query()
            ->where('id', $id)
            ->first();
    }

    public function delete(int $id): int
    {
        return MetaField::query()
            ->where('id', $id)
            ->delete();
    }

}
