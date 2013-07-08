<?php

class m130708_130152_create_user_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('user', array(
			'u_id'           => 'pk',
			'u_username'     => 'string NOT NULL',
			'u_password'     => 'string NOT NULL',
			'u_email'        => 'string NOT NULL',
		));
	}

	public function down()
	{
		$this->dropTable('user');
	}

}