<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('device_id', 255)->nullable();

            $table->binary('photo');
            $table->string('photo_path');
            $table->string('photo_name');
            $table->string('photo_system_name');

            $table->string('user_code', 25)->nullable();//password recovery code

            $table->enum('status', ['0','1','2'])->default('1');//inactive,active,suspended
            $table->enum('isDeletedAccount', ['0','1'])->default('1');// deleted. not deleted
            $table->enum('new_letter_subscription', ['yes','no'])->nullable();
            $table->enum('email_subscription', ['yes','no'])->nullable();
            $table->enum('sms_subscription', ['yes','no'])->nullable();
            $table->enum('contest_alert', ['daily','weekly','monthly','yearly'])->nullable();
            $table->enum('notification_status', ['on','off'])->nullable();

            $table->integer('created_by_user_id')->nullable();
            $table->integer('updated_by_user_id')->nullable();

            $table->integer('user_id')->unsigned();
            //   $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('users_settings');
    }
}
