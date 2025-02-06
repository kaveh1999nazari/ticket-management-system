<?php

namespace App\Exceptions;

use Exception;

class MetaFieldNotDefined extends Exception
{
    protected $key;

    // سازنده برای گرفتن فیلد مورد نظر
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    // متد render برای ارسال پیغام خطای JSON
    public function render()
    {
        return response()->json(
            ['message' => "فیلد مورد نظر '{$this->key}' تعریف نشده است"],
            406
        );
    }
}
