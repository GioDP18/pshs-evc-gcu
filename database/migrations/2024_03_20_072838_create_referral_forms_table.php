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
        Schema::create('referral_forms', function (Blueprint $table) {
            $table->id();
            $table->string('campus');
            $table->foreignId('user_id')->constrained();
            $table->string('name_of_student');
            $table->string('grade_and_section');
            $table->string('date');
            $table->text('concern');
            $table->text('brief_description')->max_length();
            $table->text('intervention_done');
            $table->boolean('follow_up');
            $table->string('others')->nullable();
            // $table->foreignId('referrer_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referral_forms');
    }
};
