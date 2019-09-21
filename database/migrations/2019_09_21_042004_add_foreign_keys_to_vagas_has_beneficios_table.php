<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVagasHasBeneficiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vagas_has_beneficios', function(Blueprint $table)
		{
			$table->foreign('beneficios_id', 'fk_empregos_has_beneficios_beneficios1')->references('id')->on('beneficios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('vagas_id', 'fk_empregos_has_beneficios_empregos1')->references('id')->on('vagas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vagas_has_beneficios', function(Blueprint $table)
		{
			$table->dropForeign('fk_empregos_has_beneficios_beneficios1');
			$table->dropForeign('fk_empregos_has_beneficios_empregos1');
		});
	}

}
