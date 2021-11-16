<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSumInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->float('sum')->default(0);
            $table->text('comment')->nullable();
        });
        Schema::table('order_products', function (Blueprint $table) {
            $table->float('sum')->default(0);
            $table->integer('discount_percent')->nullable();
            $table->boolean('is_sales')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('sum');
        });
        Schema::table('order_products', function (Blueprint $table) {
            $table->dropColumn('sum');
            $table->dropColumn('discount_percent');
            $table->dropColumn('is_sales');
        });
    }
}
