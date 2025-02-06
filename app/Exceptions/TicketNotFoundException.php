<?php

namespace App\Exceptions;

use Exception;

class TicketNotFoundException extends Exception
{
    public function render(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['message' => 'تیکت مورد نظر یافت نشد'], 404);
    }
}

