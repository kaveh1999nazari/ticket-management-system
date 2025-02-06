<?php

namespace App\Exceptions;

use Exception;

class UserAlreadyExist extends Exception
{
    public function render(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['کاربر قبلا ثبت نام کرده است'], 401);
    }
}
