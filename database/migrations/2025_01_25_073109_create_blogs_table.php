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
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('blog_id');
            $table->string('blog_title',150)->nullable();
            $table->string('blog_subtitle',500)->nullable();
            $table->string('blog_web',20)->nullable();
            $table->string('blog_image',50)->nullable();
            $table->integer('blog_order')->nullable();
            $table->integer('blog_creator')->nullable();
            $table->integer('blog_editor')->nullable();
            $table->string('blog_slug',20)->nullable();
            $table->string('blog_status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
