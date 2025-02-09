<?php

namespace Database\Seeders;

use App\Models\MetaField;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetaFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $metaFields = [
            ['meta_key' => 'national_code', 'type' => 'string', 'validation_rules' => 'regex:/^[0-9]{10}$/'],
            ['meta_key' => 'birth_date', 'type' => 'string', 'validation_rules' => 'regex:/^13[0-9]{2}-[0-1]+[1-9]-[0-3]+[0-9]$/'],
            ['meta_key' => 'first_name', 'type' => 'string', 'validation_rules' => 'min:2'],
            ['meta_key' => 'last_name', 'type' => 'string', 'validation_rules' => 'min:2'],
            ['meta_key' => 'email', 'type' => 'string', 'validation_rules' => 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
        ];

        foreach ($metaFields as $field) {
            MetaField::query()
            ->create($field);
        }

    }
}
