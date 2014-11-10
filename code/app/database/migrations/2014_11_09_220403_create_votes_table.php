<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('kb_votes', function($table)
        {
            $table->increments('id');
            $table->unsignedInteger('fk_user')->unsigned();
            $table->unsignedInteger('fk_workshop')->unsigned();

        });
        Schema::table('kb_votes', function($table){
			$table->foreign('fk_user')->references('id')->on('kb_users')->onDelete('CASCADE')->onUpdate('CASCADE');
			$table->foreign('fk_workshop')->references('id')->on('kb_workshops')->onDelete('CASCADE')->onUpdate('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kb_votes');
	}

}
