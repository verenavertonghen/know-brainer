<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkshopsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kb_workshops', function($table)
        {

            //auto increment id(pk)
            $table->increments('id');
            $table->string('title');
            $table->string('category');
            $table->text('description');
            $table->string('location');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('picture')->nullable()->default();
            $table->integer('subscribers_amount');
            $table->integer('fk_user')->unsigned();
            $table->foreign('fk_user')->references('id')->on('kb_users');
            // created_at, updated_at DATETIME
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
        Schema::drop('kb_workshops');
	}

}
