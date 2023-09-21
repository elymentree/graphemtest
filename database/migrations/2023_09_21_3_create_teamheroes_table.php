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
        Schema::create('teamheroes', function (Blueprint $table) {
            $table->id();
            $table->integer('team_id')->unsigned();
            $table->integer('hero_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('teamheroes',function ($table){
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('hero_id')->references('id')->on('heroes')->onDelete('cascade');
            $table->unique(['team_id', 'hero_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teamheroes');
    }
};
