<?php

use App\Enums\Gender;
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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone');
            $table->string('email');
            $table->enum('gender', Gender::toArray())->nullable();
            $table->text('address')->nullable();
            $table->text('notes')->nullable();
            $table->string('course_code',6);
            $table->text('course_title');
            $table->text('course_venue');
            $table->text('course_category');
            $table->date('course_start_date');
            $table->date('course_end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
