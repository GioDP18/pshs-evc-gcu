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
        Schema::create('gcs_pks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gcs_id')->constrained('guidance_call_slips');
            $table->string('s1')->nullable();
            $table->string('s2')->nullable();
            $table->string('s3')->nullable();
            $table->string('s4')->nullable();
            $table->string('s5')->nullable();
            $table->string('gs1')->nullable();
            $table->string('gs2')->nullable();
            $table->string('gs3')->nullable();
            $table->string('gs4')->nullable();
            $table->string('gs5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gcs_pks');
    }
};
