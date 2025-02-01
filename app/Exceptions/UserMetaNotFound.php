<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class UserMetaNotFound extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
            'message' => 'کاربر مورد نظر یافت نشد'
        ], 406);
    }
}
