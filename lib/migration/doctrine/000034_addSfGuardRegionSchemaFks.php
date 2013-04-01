<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class addSfGuardRegionSchemaFks extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('sf_guard_user_region_schema', 'sf_guard_user_region_schema_region_id_region_id', array(
             'name' => 'sf_guard_user_region_schema_region_id_region_id',
             'local' => 'region_id',
             'foreign' => 'id',
             'foreignTable' => 'region',
             ));
        $this->createForeignKey('sf_guard_user_region_schema', 'sf_guard_user_region_schema_user_id_sf_guard_user_id', array(
             'name' => 'sf_guard_user_region_schema_user_id_sf_guard_user_id',
             'local' => 'user_id',
             'foreign' => 'id',
             'foreignTable' => 'sf_guard_user',
             ));
        $this->addIndex('sf_guard_user_region_schema', 'sf_guard_user_region_schema_region_id', array(
             'fields' =>
             array(
              0 => 'region_id',
             ),
             ));
        $this->addIndex('sf_guard_user_region_schema', 'sf_guard_user_region_schema_user_id', array(
             'fields' =>
             array(
              0 => 'user_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('sf_guard_user_region_schema', 'sf_guard_user_region_schema_region_id_region_id');
        $this->dropForeignKey('sf_guard_user_region_schema', 'sf_guard_user_region_schema_user_id_sf_guard_user_id');
        $this->removeIndex('sf_guard_user_region_schema', 'sf_guard_user_region_schema_region_id', array(
             'fields' => 
             array(
              0 => 'region_id',
             ),
             ));
        $this->removeIndex('sf_guard_user_region_schema', 'sf_guard_user_region_schema_user_id', array(
             'fields' => 
             array(
              0 => 'user_id',
             ),
             ));
    }
}