<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixedExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_expenses', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('cat_id')->unsigned();
            $table->integer('amount');
            $table->foreign('user_id')
                ->references('id')->on('users');

//            $table->foreign('cat_id')
//                ->references('id')->on('expense_cats');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixed_expenses');
    }
}
