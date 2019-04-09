<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEmpregosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('empregos', function(Blueprint $table)
		{
			$table->foreign('empresas_id', 'fk_empregos_empresas1')->references('id')->on('empresas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('status_vaga_id', 'fk_empregos_status_vaga1')->references('id')->on('status_vaga')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('empregos', function(Blueprint $table)
		{
			$table->dropForeign('fk_empregos_empresas1');
			$table->dropForeign('fk_empregos_status_vaga1');
		});
	}

}
