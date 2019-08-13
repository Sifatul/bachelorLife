<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('reason'); 
            //1 for registration email verification, 2 for password reset
            $table->char('reset_token', 60)->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('all_tokens');
    }
}
