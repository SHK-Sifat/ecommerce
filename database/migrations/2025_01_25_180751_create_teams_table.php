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
            $table->bigIncrements('team_id');
            $table->string('team_name',40)->nullable();
            $table->string('team_title',50)->nullable();
            $table->string('team_facebook')->nullable();
            $table->string('team_linkedin')->nullable();
            $table->string('team_instagram')->nullable();
            $table->string('team_twitter')->nullable();
            $table->string('team_image',50)->nullable();
            $table->integer('team_creator')->nullable();
            $table->integer('team_editor')->nullable();
            $table->string('team_slug',20)->nullable();
            $table->string('team_status')->default(1);
            $table->rememberToken();
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
