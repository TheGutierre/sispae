<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVagasHasLocaisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vagas_has_locais', function(Blueprint $table)
		{
			$table->foreign('vagas_id', 'fk_empregos_has_locais_empregos1')->references('id')->on('vagas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
		Schema::table('vagas_has_locais', function(Blueprint $table)
		{
			$table->dropForeign('fk_empregos_has_locais_empregos1');
			$table->dropForeign('fk_empregos_has_locais_locais1');
		});
	}

}
