<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class addSfGuardCitySchema extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('sf_guard_user_city_schema', array(
             'user_id' => 
             array(
              'type' => 'integer',
              'primary' => '1',
              'length' => '8',
             ),
             'city_id' => 
             array(
              'type' => 'integer',
              'primary' => '1',
              'unsigned' => '1',
              'length' => '8',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'user_id',
              1 => 'city_id',
             ),
             'collate' => 'utf8_general_ci',
             'charset' => 'utf8',
             ));
        $this->changeColumn('sf_guard_user_region_schema', 'region_id', 'integer', '8', array(
             'primary' => '1',
             'unsigned' => '1',
             ));
    }

    public function down()
    {
        $this->dropTable('sf_guard_user_city_schema');
    }
}