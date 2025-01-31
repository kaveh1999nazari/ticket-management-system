<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users_meta_fields', function (Blueprint $table) {
            $table->id();
            $table->string('meta_key')->unique();
            $table->string('label')->nullable();
            $table->enum('type', [
                'string',
                'text',
                'integer',
                'float',
                'boolean',
                'date',
                'datetime',
                'time',
                'json',
                'array',
                'file',
                'image',
            ]);
            $table->text('validation_rules')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_meta_fields');
    }
};
