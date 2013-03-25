<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class addGeoBase extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('city', array(
             'id' => 
             array(
              'type' => 'integer',
              'unsigned' => '1',
              'primary' => '1',
              'autoincrement' => '1',
              'length' => '11',
             ),
             'country_id' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'unsigned' => '1',
              'length' => '11',
             ),
             'region_id' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'unsigned' => '1',
              'length' => '11',
             ),
             'name' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '255',
             ),
             ), array(
             'indexes' => 
             array(
              'country_id_idx' => 
              array(
              'fields' => 
              array(
               0 => 'country_id',
              ),
              ),
              'region_id_idx' => 
              array(
              'fields' => 
              array(
               0 => 'region_id',
              ),
              ),
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_general_ci',
             'charset' => 'utf8',
             ));
        $this->createTable('country', array(
             'id' => 
             array(
              'type' => 'integer',
              'unsigned' => '1',
              'primary' => '1',
              'autoincrement' => '1',
              'length' => '11',
             ),
             'name' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '255',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_general_ci',
             'charset' => 'utf8',
             ));
        $this->createTable('region', array(
             'id' => 
             array(
              'type' => 'integer',
              'unsigned' => '1',
              'primary' => '1',
              'autoincrement' => '1',
              'length' => '11',
             ),
             'country_id' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'unsigned' => '1',
              'length' => '11',
             ),
             'name' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '255',
             ),
             ), array(
             'indexes' => 
             array(
              'country_id_idx' => 
              array(
              'fields' => 
              array(
               0 => 'country_id',
              ),
              ),
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_general_ci',
             'charset' => 'utf8',
             ));
    }

    public function down()
    {
        $this->dropTable('city');
        $this->dropTable('country');
        $this->dropTable('region');
    }
}