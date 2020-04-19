<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_user', function (Blueprint $table) {
            $table->integer('email_id')->unique()->unsigned()->index();
         //  $table->foreign('email_id')->references('id')->on('emails')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();

            $table->integer('primary_email_id')->unique()->unsigned()->index()->nullable();
         //   $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['email_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('email_user');
    }
}
