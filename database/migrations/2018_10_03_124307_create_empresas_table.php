<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpresasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empresas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('razao_social', 80)->nullable()->default('');
			$table->string('nome_fantasia', 45)->nullable();
			$table->string('cpf', 45)->nullable();
			$table->string('cpnj', 45)->nullable();
			$table->string('ramo_atuacao', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('empresas');
	}

}
