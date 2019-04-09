<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutputTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('output', function(Blueprint $table)
		{
			$table->text('RA', 65535)->nullable();
			$table->text('NOME', 65535)->nullable();
			$table->text('BAIRRO', 65535)->nullable();
			$table->text('ENDERECO', 65535)->nullable();
			$table->text('CIDADE', 65535)->nullable();
			$table->text('TELEFONE', 65535)->nullable();
			$table->text('TELEFONE2', 65535)->nullable();
			$table->text('EMAIL', 65535)->nullable();
			$table->text('DATA_INGRESSO', 65535)->nullable();
			$table->text('DATA_FIM', 65535)->nullable();
			$table->text('CURSO', 65535)->nullable();
			$table->text('STATUS', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('output');
	}

}
