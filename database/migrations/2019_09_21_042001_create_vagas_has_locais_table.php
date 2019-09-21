<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVagasHasLocaisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vagas_has_locais', function(Blueprint $table)
		{
			$table->integer('vagas_id')->index('fk_empregos_has_locais_empregos1_idx');
			$table->integer('locais_id')->index('fk_empregos_has_locais_locais1_idx');
			$table->timestamps();
			$table->primary(['vagas_id','locais_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vagas_has_locais');
	}

}
