<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstagiosHasBeneficiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estagios_has_beneficios', function(Blueprint $table)
		{
			$table->integer('estagios_id')->index('fk_estagios_has_beneficios_estagios1_idx');
			$table->integer('beneficios_id')->index('fk_estagios_has_beneficios_beneficios1_idx');
			$table->primary(['estagios_id','beneficios_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estagios_has_beneficios');
	}

}
