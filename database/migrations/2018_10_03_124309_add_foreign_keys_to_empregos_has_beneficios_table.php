<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEmpregosHasBeneficiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('empregos_has_beneficios', function(Blueprint $table)
		{
			$table->foreign('beneficios_id', 'fk_empregos_has_beneficios_beneficios1')->references('id')->on('beneficios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('empregos_id', 'fk_empregos_has_beneficios_empregos1')->references('id')->on('empregos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('empregos_has_beneficios', function(Blueprint $table)
		{
			$table->dropForeign('fk_empregos_has_beneficios_beneficios1');
			$table->dropForeign('fk_empregos_has_beneficios_empregos1');
		});
	}

}
