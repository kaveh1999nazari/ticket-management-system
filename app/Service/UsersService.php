<?php

namespace App\Service;

use App\Exceptions\UserAlreadyExist;
use App\Models\User;
use App\Repository\UsersRepository;

class UsersService
{
    public function __construct(private readonly UsersRepository $usersRepository)
    {
    }

    public function register(array $data)
    {
        $check = $this->usersRepository->checkExistMobile($data['mobile']);
        if ($check === true) {
            throw new UserAlreadyExist();
        }
        return $this->usersRepository->create($data);
    }

}
