<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class addWorkSheetStatusAndAuditor extends Doctrine_Migration_Base
{
	public function up()
	{
		$this->addColumn('worksheet', 'status', 'integer', '4', array());
		$this->addColumn('worksheet', 'auditor_id', 'integer', '8', array());
	}

	public function down()
	{
		$this->removeColumn('worksheet', 'status');
		$this->removeColumn('worksheet', 'auditor_id');
	}
}