<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class addWorksheetToOutlet extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('worksheet', 'worksheet_outlet_id_outlet_id', array(
             'name' => 'worksheet_outlet_id_outlet_id',
             'local' => 'outlet_id',
             'foreign' => 'id',
             'foreignTable' => 'outlet',
             ));
        $this->addIndex('worksheet', 'worksheet_outlet_id', array(
             'fields' => 
             array(
              0 => 'outlet_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('worksheet', 'worksheet_outlet_id_outlet_id');
        $this->removeIndex('worksheet', 'worksheet_outlet_id', array(
             'fields' => 
             array(
              0 => 'outlet_id',
             ),
             ));
    }
}