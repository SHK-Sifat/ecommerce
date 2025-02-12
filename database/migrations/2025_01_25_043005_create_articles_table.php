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
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('article_id');
            $table->string('article_title',150)->nullable();
            $table->string('article_subtitle',500)->nullable();
            $table->string('article_web',20)->nullable();
            $table->string('article_image',50)->nullable();
            $table->integer('article_order')->nullable();
            $table->integer('article_creator')->nullable();
            $table->integer('article_editor')->nullable();
            $table->string('article_slug',20)->nullable();
            $table->string('article_status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
