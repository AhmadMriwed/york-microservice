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
        Schema::create('certificate_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_code', 9)->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->json('message');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_reviews');
    }
};
