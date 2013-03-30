<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class addOutletFks extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('outlet', 'outlet_region_id_region_id', array(
             'name' => 'outlet_region_id_region_id',
             'local' => 'region_id',
             'foreign' => 'id',
             'foreignTable' => 'region',
             ));
        $this->createForeignKey('outlet', 'outlet_city_id_city_id', array(
             'name' => 'outlet_city_id_city_id',
             'local' => 'city_id',
             'foreign' => 'id',
             'foreignTable' => 'city',
             ));
        $this->createForeignKey('outlet', 'outlet_distributor_id_distributor_id', array(
             'name' => 'outlet_distributor_id_distributor_id',
             'local' => 'distributor_id',
             'foreign' => 'id',
             'foreignTable' => 'distributor',
             ));
        $this->addIndex('outlet', 'type_idx', array(
             'fields' => 
             array(
              0 => 'type',
             ),
             ));
        $this->addIndex('outlet', 'group_type_idx', array(
             'fields' => 
             array(
              0 => 'group_type',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('outlet', 'outlet_region_id_region_id');
        $this->dropForeignKey('outlet', 'outlet_city_id_city_id');
        $this->dropForeignKey('outlet', 'outlet_distributor_id_distributor_id');
        $this->removeIndex('outlet', 'type_idx', array(
             'fields' => 
             array(
              0 => 'type',
             ),
             ));
        $this->removeIndex('outlet', 'group_type_idx', array(
             'fields' => 
             array(
              0 => 'group_type',
             ),
             ));
    }
}