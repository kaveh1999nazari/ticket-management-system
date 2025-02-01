<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class UserNotFound extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
            'message' => 'کاربر درخواستی ثبت نام نکرده است'], 406
        );

    }
}
