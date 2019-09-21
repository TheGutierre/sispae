<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnderecosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enderecos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('logradouro', 80);
			$table->string('numero', 10)->nullable();
			$table->string('bairro', 45)->nullable();
			$table->string('cep', 15)->nullable();
			$table->string('complemento', 45)->nullable();
			$table->string('referencia', 45)->nullable();
			$table->string('cidade', 45)->nullable();
			$table->string('estado', 2)->nullable();
			$table->integer('empresas_id')->index('fk_enderecos_empresas1_idx');
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
		Schema::drop('enderecos');
	}

}
