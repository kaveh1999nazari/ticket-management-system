<?php

namespace App\Service;

use App\Exceptions\MetaFieldNotDefined;
use App\Exceptions\UserAlreadyExist;
use App\Models\User;
use App\Repository\MetaFieldRepository;
use App\Repository\UsersRepository;

class UsersService
{
    public function __construct(
        private readonly UsersRepository $usersRepository,
        private readonly MetaFieldRepository $metaFieldRepository
    )
    {
    }

    public function register(array $data)
    {
        if ($this->usersRepository->checkExistMobile($data['mobile'])) {
            throw new UserAlreadyExist();
        }

        $meta = $data['meta'] ?? [];
        $validMeta = [];

        foreach ($meta as $key => $value) {
            if (!$this->metaFieldRepository->isValidMetaField($key)) {
                throw new MetaFieldNotDefined($key);
            }
            $validMeta[] = [
                'meta_id' => $key,
                'meta_value' => $value,
            ];
        }

        $user = $this->usersRepository->create($data);

        if (!empty($validMeta)) {
            $this->usersRepository->attachMeta($user, $validMeta);
        }

        return $user;
    }

}
