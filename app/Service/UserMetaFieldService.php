<?php

namespace App\Service;

use App\Exceptions\UserMetaNotFound;
use App\Models\MetaField;
use App\Repository\UserMetaFieldRepository;
use Illuminate\Database\Eloquent\Collection;

class UserMetaFieldService
{
    public function __construct(private readonly UserMetaFieldRepository $metaRepository)
    {
    }

    public function create(array $data): MetaField
    {
        return $this->metaRepository->create($data);
    }

    public function list(): Collection
    {
        return $this->metaRepository->list();
    }

    public function delete(int $id): int
    {
//        $check = $this->metaRepository->get($id);
//        if ($check === null) {
//            throw new UserMetaNotFound();
//        }
        return $this->metaRepository->delete($id);
    }

}
