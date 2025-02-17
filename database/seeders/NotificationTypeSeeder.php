<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Kaveh\NotificationService\Models\NotificationType;

class NotificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['slug' => 'ورود', 'name' => 'login'],
            ['slug' => 'ثبت تیکت', 'name' => 'ticket_created'],
            ['slug' => 'تغییر وضعیت تیکت', 'name' => 'ticket_updated'],
        ];

        foreach ($types as $type) {
            NotificationType::query()
                ->create($type);
        }
    }
}
