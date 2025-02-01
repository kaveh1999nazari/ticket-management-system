<?php

namespace App\Exceptions;

use Exception;

class UserAlreadyExist extends Exception
{
    public function render()
    {
        return response()->json(['کاربر قبلا ثبت نام کرده است'], 401);
    }
}
