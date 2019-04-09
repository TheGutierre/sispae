<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstagiosHasLocaisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estagios_has_locais', function(Blueprint $table)
		{
			$table->integer('estagios_id')->index('fk_estagios_has_locais_estagios1_idx');
			$table->integer('locais_id')->index('fk_estagios_has_locais_locais1_idx');
			$table->primary(['estagios_id','locais_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estagios_has_locais');
	}

}
