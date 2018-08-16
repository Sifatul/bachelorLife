<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariableExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variable_expenses', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('rent')->nullable();
            $table->integer('electric_bill')->nullable();
            $table->integer('gas_bill')->nullable();
            $table->integer('bazar_bill')->nullable();
            $table->integer('bua_bill')->nullable();
            $table->integer('internet_bill')->nullable();
            $table->integer('other_bill')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variable_expenses');
    }
}
