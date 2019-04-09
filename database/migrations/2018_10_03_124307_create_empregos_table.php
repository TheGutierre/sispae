<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpregosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empregos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('cargo', 80);
			$table->text('descricao', 65535)->nullable();
			$table->integer('vagas')->nullable();
			$table->string('faixa_sal_min', 45)->nullable();
			$table->string('faixa_sal_max', 45)->nullable();
			$table->boolean('acombinar')->nullable();
			$table->boolean('pornecessidades')->nullable();
			$table->boolean('recebercurriculos')->nullable();
			$table->string('emailcurriculos', 45)->nullable();
			$table->integer('empresas_id')->index('fk_empregos_empresas1_idx');
			$table->integer('status_vaga_id')->index('fk_empregos_status_vaga1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('empregos');
	}

}
