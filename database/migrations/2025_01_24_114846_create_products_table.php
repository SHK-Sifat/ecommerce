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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product_title',100)->nullable();
            $table->string('product_details',400)->nullable();
            $table->string('product_discount',20)->nullable();
            $table->string('product_available',20)->nullable();
            $table->string('product_oldprice',20)->nullable();
            $table->string('product_newprice',20)->nullable();
            $table->string('product_fabric',20)->nullable();
            $table->string('product_ctions',20)->nullable();
            $table->string('product_sleeve',20)->nullable();
            $table->string('product_origin',20)->nullable();
            $table->string('product_categori')->nullable();
            $table->string('product_type')->nullable();
            $table->string('product_image',50)->nullable();
            $table->integer('product_creator')->nullable();
            $table->integer('product_editor')->nullable();
            $table->string('product_slug',20)->nullable();
            $table->string('product_status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
