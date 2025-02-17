<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Kaveh\NotificationService\Models\NotificationChannel;

class NotificationChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $channels = [
            ['slug' => 'درون برنامه', 'name' => 'database'],
            ['slug' => 'ایمیل', 'name' => 'mail'],
            ['slug' => 'پیامک', 'name' => 'sms'],
        ];

        foreach ($channels as $channel) {
            NotificationChannel::query()
                ->create($channel);
        }
    }
}
