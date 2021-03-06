<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class addHistoryModelFks extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('history', 'history_user_id_sf_guard_user_id', array(
             'name' => 'history_user_id_sf_guard_user_id',
             'local' => 'user_id',
             'foreign' => 'id',
             'foreignTable' => 'sf_guard_user',
             ));
        $this->addIndex('history', 'history_user_id', array(
             'fields' => 
             array(
              0 => 'user_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('history', 'history_user_id_sf_guard_user_id');
        $this->removeIndex('history', 'history_user_id', array(
             'fields' => 
             array(
              0 => 'user_id',
             ),
             ));
    }
}