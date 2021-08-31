<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('name');
            $table->string('image', 255);
            $table->text('description');
            $table->integer('brand_id')->nullable();
            $table->integer('category_id');
            $table->integer('country_id')->nullable();
            $table->integer('quantity');
            $table->integer('sum');
            $table->boolean('is_sales')->default(0);
            $table->integer('discount_percent')->nullable();
            $table->boolean('is_new')->default(1);
            $table->timestamps();
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
}
