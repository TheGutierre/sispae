<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEstagiosHasBeneficiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('estagios_has_beneficios', function(Blueprint $table)
		{
			$table->foreign('beneficios_id', 'fk_estagios_has_beneficios_beneficios1')->references('id')->on('beneficios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('estagios_id', 'fk_estagios_has_beneficios_estagios1')->references('id')->on('estagios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('estagios_has_beneficios', function(Blueprint $table)
		{
			$table->dropForeign('fk_estagios_has_beneficios_beneficios1');
			$table->dropForeign('fk_estagios_has_beneficios_estagios1');
		});
	}

}
