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
        Schema::create('authorize', function (Blueprint $table) {
            $table->id();
            $table->string('mobile');
            $table->string('code')->nullable();
            $table->dateTime('code_expired_at')->nullable();
            $table->boolean('is_verified')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authorize');
    }
};
