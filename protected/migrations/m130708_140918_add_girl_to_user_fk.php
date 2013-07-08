<?php

class m130708_140918_add_girl_to_user_fk extends CDbMigration
{
	public function up()
	{
		$this->addColumn('girl', 'g_user', 'int(11) NOT NULL');

		$this->addForeignKey(
			'fk_girl_user',
			'girl', 'g_user',
			'user', 'u_id',
			'CASCADE',
			'CASCADE');
	}

	public function down()
	{
		$this->dropForeignKey('fk_girl_user', 'girl');
		$this->dropColumn('girl', 'g_user');
	}

}