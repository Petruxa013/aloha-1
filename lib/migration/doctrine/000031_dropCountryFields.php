<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class dropCountryFields extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->removeColumn('city', 'country_id');
        $this->removeColumn('region', 'country_id');
    }

    public function down()
    {
        $this->addColumn('city', 'country_id', 'integer', '11', array(
             'notnull' => '1',
             'unsigned' => '1',
             ));
        $this->addColumn('region', 'country_id', 'integer', '11', array(
             'notnull' => '1',
             'unsigned' => '1',
             ));
    }
}