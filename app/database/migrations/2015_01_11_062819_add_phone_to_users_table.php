<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPhoneToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{	
		// 删除 email 字段
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn('email');
		});

		Schema::table('users', function(Blueprint $table)
		{
			$table->string('email')->nullable()->unique()->after('id')->comment('Email');
			$table->string('phone')->nullable()->unique()->after('id')->comment('手机号');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn('phone');
		});
	}

}
