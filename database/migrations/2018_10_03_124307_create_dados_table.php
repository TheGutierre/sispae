<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDadosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dados', function(Blueprint $table)
		{
			$table->text('ra', 65535)->nullable();
			$table->text('nome', 65535)->nullable();
			$table->text('bairro', 65535)->nullable();
			$table->text('endereco', 65535)->nullable();
			$table->text('cidade', 65535)->nullable();
			$table->text('tel', 65535)->nullable();
			$table->text('tel2', 65535)->nullable();
			$table->text('email', 65535)->nullable();
			$table->text('data_ingresso', 65535)->nullable();
			$table->text('data_conclusao', 65535)->nullable();
			$table->text('curso', 65535)->nullable();
			$table->text('status', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dados');
	}

}
