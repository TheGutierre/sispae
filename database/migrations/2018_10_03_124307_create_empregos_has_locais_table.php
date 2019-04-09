<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpregosHasLocaisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empregos_has_locais', function(Blueprint $table)
		{
			$table->integer('empregos_id')->index('fk_empregos_has_locais_empregos1_idx');
			$table->integer('locais_id')->index('fk_empregos_has_locais_locais1_idx');
			$table->primary(['empregos_id','locais_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('empregos_has_locais');
	}

}
