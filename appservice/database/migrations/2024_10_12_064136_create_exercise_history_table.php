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
        Schema::create('exercise_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('scores')->default(0);
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('exercise_id');
            $table->index('exercise_id');
            $table->index('session_id');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_history');
    }
};
