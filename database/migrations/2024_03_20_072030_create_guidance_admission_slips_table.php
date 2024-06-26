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
        Schema::create('guidance_admission_slips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('campus');
            $table->string('name_of_student');
            $table->string('grade_and_section');
            $table->string('dear');
            $table->date('last_visited_date');
            $table->time('last_visited_time_start');
            $table->time('last_visited_time_end');
            $table->string('guidance_counselor');
            $table->string('recieved_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guidance_admission_slips');
    }
};
