<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocaisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locais', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('estado', 2)->nullable();
			$table->string('cidade', 45)->nullable();
			$table->string('bairro', 45)->nullable();
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
		Schema::drop('locais');
	}

}
