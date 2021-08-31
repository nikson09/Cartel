<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_users', function (Blueprint $table) {
            $table->id();
            $table->string('phone',30)->nullable();
            $table->string('name', 100)->nullable();
            $table->string('LastName', 100)->nullable();
            $table->string('region', 100)->nullable();
            $table->string('cities', 100)->nullable();
            $table->string('department', 100)->nullable();
            $table->integer('shopping_id')->nullable();
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
        Schema::dropIfExists('order_users');
    }
}
