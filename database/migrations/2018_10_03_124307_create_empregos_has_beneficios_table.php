<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpregosHasBeneficiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empregos_has_beneficios', function(Blueprint $table)
		{
			$table->integer('empregos_id')->index('fk_empregos_has_beneficios_empregos1_idx');
			$table->integer('beneficios_id')->index('fk_empregos_has_beneficios_beneficios1_idx');
			$table->primary(['empregos_id','beneficios_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('empregos_has_beneficios');
	}

}
