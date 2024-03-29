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
        Schema::create('behavior_spotteds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('referral_form_id')->constrained();
            $table->boolean('b_1');
            $table->boolean('b_2');
            $table->boolean('b_3');
            $table->boolean('b_4');
            $table->boolean('b_5');
            $table->boolean('b_6');
            $table->boolean('b_7');
            $table->boolean('b_8');
            $table->boolean('b_9');
            $table->boolean('b_10');
            $table->boolean('b_11');
            $table->boolean('b_12');
            $table->boolean('b_13');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('behavior_spotteds');
    }
};
