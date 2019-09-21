<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVagasHasAreasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vagas_has_areas', function(Blueprint $table)
		{
			$table->integer('vagas_id')->index('fk_empregos_has_areas_empregos1_idx');
			$table->integer('areas_id')->index('fk_empregos_has_areas_areas1_idx');
			$table->timestamps();
			$table->primary(['vagas_id','areas_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vagas_has_areas');
	}

}
