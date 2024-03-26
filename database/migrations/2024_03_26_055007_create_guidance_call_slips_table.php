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
        Schema::create('guidance_call_slips', function (Blueprint $table) {
            $table->id();
            $table->string('campus');
            $table->date('date');
            $table->time('time');
            $table->string('type_of_counseling');
            $table->time('counseling_time_start');
            $table->time('counseling_time_end');
            $table->string('guidance_counselor');
            $table->string('teacher_in_charge');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guidance_call_slips');
    }
};
