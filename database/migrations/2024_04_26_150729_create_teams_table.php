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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('team_eID');
            $table->string('team_name');
            $table->string('team_category');
            $table->string('team_administration');
            $table->string('school_name');
            $table->string('coach_name');
            $table->string('coach_eID');
            $table->string('coach_phone');
            $table->json('students')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
