<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVagasHasBeneficiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vagas_has_beneficios', function(Blueprint $table)
		{
			$table->integer('vagas_id')->index('fk_empregos_has_beneficios_empregos1_idx');
			$table->integer('beneficios_id')->index('fk_empregos_has_beneficios_beneficios1_idx');
			$table->timestamps();
			$table->primary(['vagas_id','beneficios_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vagas_has_beneficios');
	}

}
