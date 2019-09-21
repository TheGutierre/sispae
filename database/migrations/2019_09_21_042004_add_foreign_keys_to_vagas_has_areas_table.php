<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVagasHasAreasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vagas_has_areas', function(Blueprint $table)
		{
			$table->foreign('areas_id', 'fk_empregos_has_areas_areas1')->references('id')->on('areas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('vagas_id', 'fk_empregos_has_areas_empregos1')->references('id')->on('vagas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vagas_has_areas', function(Blueprint $table)
		{
			$table->dropForeign('fk_empregos_has_areas_areas1');
			$table->dropForeign('fk_empregos_has_areas_empregos1');
		});
	}

}
