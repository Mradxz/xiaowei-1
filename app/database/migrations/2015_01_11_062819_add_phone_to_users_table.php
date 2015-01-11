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
			$table->string('name')->after('id')->comment('姓名');
		});

		$date = date('Y-m-d H:i:s');

		// 添加超级管理员组
		DB::insert('insert into groups (id, name, created_at, updated_at) values (?, ?, ?, ?)', [
				1, '超级管理员组', $date, $date
			]);

		// 添加普通用户组
		DB::insert('insert into groups (id, name, created_at, updated_at) values (?, ?, ?, ?)', [
				2, '普通用户组', $date, $date
			]);

		// 添加超级管理员
		DB::insert('insert into users (id, name, email, phone, password, activated, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?)', [
				1, '超级管理员', 'admin@xiaowei.com', '18888888888', Hash::make('123456'), 1, $date, $date
			]);

		// 添加组关系
		DB::insert('insert into users_groups (user_id, group_id) values (?, ?)', array(1, 1));
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
			$table->dropColumn('name');
			$table->dropColumn('phone');
		});
	}

}
