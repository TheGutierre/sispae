<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResponsaveisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('responsaveis', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 45)->nullable();
			$table->string('cargo', 45)->nullable();
			$table->string('cpf', 45)->nullable();
			$table->integer('status')->nullable();
			$table->timestamps();
			$table->integer('users_id')->unsigned()->index('fk_responsaveis_users_idx');
			$table->integer('empresas_id')->index('fk_responsaveis_empresas1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('responsaveis');
	}

}
