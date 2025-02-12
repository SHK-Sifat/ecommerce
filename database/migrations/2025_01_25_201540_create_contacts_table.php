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
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('contact_id');
            $table->string('contact_address',200)->nullable();
            $table->string('contact_phone1',20)->nullable();
            $table->string('contact_phone2',20)->nullable();
            $table->string('contact_email')->nullable();
            $table->integer('contact_creator')->nullable();
            $table->string('contact_country',30)->nullable();
            $table->integer('contact_editor')->nullable();
            $table->string('contact_slug',20)->nullable();
            $table->string('contact_status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
