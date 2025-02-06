<?php

namespace App\Exceptions;

use Exception;

class TicketReplyNotAccess extends Exception
{
    public function render()
    {
        return response()->json([
            'message' => 'شما مجاز به پاسخ این تیکت نیستید'
        ], 406
        );
    }
}
