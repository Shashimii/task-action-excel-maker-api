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
        Schema::create('assigned', function (Blueprint $table) {
            $table->id();
            $table->integer('officer_id');
            $table->integer('duty_id');
            $table->string('officer');
            $table->string('duty');
            $table->string('date');
            $table->string('code');
            $table->string('officerIndex');
            $table->string('dutyIndex');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assigned');
    }
};
