<?php

namespace App\Repository;

use App\Models\UserMeta;
use Illuminate\Database\Eloquent\Collection;

class UserMetaRepository
{
    public function get(int $userId, int $metaId): Collection
    {
        return UserMeta::query()
            ->where('user_id', $userId)
            ->where('meta_id', $metaId)
            ->get('meta_value');
    }

    public function getEmailByUserId(int $userId): ?string
    {
        $emailMeta = UserMeta::query()
            ->where('user_id', $userId)
            ->where('meta_id', 5)
            ->first();

        return trim($emailMeta->getAttributes()['meta_value'], '""') ?? null;
    }

}
