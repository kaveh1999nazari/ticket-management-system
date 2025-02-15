<?php

namespace Database\Seeders;

use App\Models\NotificationChannel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
