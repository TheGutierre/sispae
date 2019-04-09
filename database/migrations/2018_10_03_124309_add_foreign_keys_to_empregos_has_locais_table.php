<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEmpregosHasLocaisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('empregos_has_locais', function(Blueprint $table)
		{
			$table->foreign('empregos_id', 'fk_empregos_has_locais_empregos1')->references('id')->on('empregos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('locais_id', 'fk_empregos_has_locais_locais1')->references('id')->on('locais')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('empregos_has_locais', function(Blueprint $table)
		{
			$table->dropForeign('fk_empregos_has_locais_empregos1');
			$table->dropForeign('fk_empregos_has_locais_locais1');
		});
	}

}
