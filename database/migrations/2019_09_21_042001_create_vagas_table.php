<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVagasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vagas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('tipo', 45);
			$table->string('cargo', 80);
			$table->text('descricao', 65535)->nullable();
			$table->integer('vagas')->nullable();
			$table->string('faixa_sal_min', 45)->nullable();
			$table->string('faixa_sal_max', 45)->nullable();
			$table->boolean('acombinar')->nullable();
			$table->boolean('pornecessidades')->nullable();
			$table->boolean('recebercurriculos')->nullable();
			$table->string('emailcurriculos', 45)->nullable();
			$table->string('status', 15);
			$table->integer('empresas_id')->index('fk_empregos_empresas1_idx');
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
		Schema::drop('vagas');
	}

}
