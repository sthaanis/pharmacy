<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_key');
            $table->string('product_code');
            $table->string('product_name');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('medicine_type_id');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('medicine_type_id')->references('id')->on('medicine_types')->onUpdate('cascade')->onDelete('cascade');
            $table->string('quantity');
            $table->string('mrp');
            $table->string('short_desc');
            $table->string('long_desc');
            $table->enum('availabilty',['yes','no']);
            $table->enum('status',['publish','draft']);
            $table->enum('is_featured',['yes','no']);
            $table->enum('is_topselling',['yes','no']);
            $table->string('special_price');
            $table->binary('image');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
