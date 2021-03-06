<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class addUserSchemaFks extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('sf_guard_user_schema', 'sf_guard_user_schema_master_id_sf_guard_user_id', array(
             'name' => 'sf_guard_user_schema_master_id_sf_guard_user_id',
             'local' => 'master_id',
             'foreign' => 'id',
             'foreignTable' => 'sf_guard_user',
             ));
        $this->addIndex('sf_guard_user_schema', 'sf_guard_user_schema_master_id', array(
             'fields' => 
             array(
              0 => 'master_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('sf_guard_user_schema', 'sf_guard_user_schema_master_id_sf_guard_user_id');
        $this->removeIndex('sf_guard_user_schema', 'sf_guard_user_schema_master_id', array(
             'fields' => 
             array(
              0 => 'master_id',
             ),
             ));
    }
}