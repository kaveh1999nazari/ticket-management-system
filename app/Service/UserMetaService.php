<?php

namespace App\Service;

use App\Exceptions\UserMetaNotFound;
use App\Models\UserMeta;
use App\Repository\UserMetaRepository;
use Illuminate\Database\Eloquent\Collection;

class UserMetaService
{
    public function __construct(private readonly UserMetaRepository $metaRepository)
    {
    }

    public function create(array $data): UserMeta
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
