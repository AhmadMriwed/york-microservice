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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->mediumText('img')->nullable();
            $table->json('title');
            $table->json('description');
            $table->json('first_btn_text');
            $table->string('first_btn_url',4096);
            $table->json('second_btn_text');
            $table->string('second_btn_url',4096);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
