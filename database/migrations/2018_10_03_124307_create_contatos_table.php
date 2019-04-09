<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContatosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contatos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('telefone', 20)->nullable();
			$table->string('telefone2', 20)->nullable();
			$table->string('email', 45)->nullable();
			$table->integer('empresas_id')->index('fk_contatos_empresas1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contatos');
	}

}
