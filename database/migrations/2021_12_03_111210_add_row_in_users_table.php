<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRowInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone',30)->nullable();
            $table->string('LastName', 100)->nullable();
            $table->string('region', 100)->nullable();
            $table->string('cities', 100)->nullable();
            $table->string('department', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('LastName');
            $table->dropColumn('phone');
            $table->dropColumn('region');
            $table->dropColumn('cities');
            $table->dropColumn('department');
        });
    }
}
