<?php

class m130708_140928_add_agency_to_user_fk extends CDbMigration
{
	public function up()
	{
		$this->addColumn('agency', 'a_user', 'int(11) NOT NULL');

		$this->addForeignKey(
			'fk_agency_user',
			'agency', 'a_user',
			'user', 'u_id',
			'CASCADE',
			'CASCADE');
	}

	public function down()
	{
		$this->dropForeignKey('fk_agency_user', 'agency');
		$this->dropColumn('agency', 'a_user');
	}

}