<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class addContacsToSfGuardUser extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('sf_guard_user', 'contact_comments', 'string', '255', array(
             ));
        $this->addColumn('sf_guard_user', 'patrionimic', 'string', '255', array(
             ));
    }

    public function down()
    {
        $this->removeColumn('sf_guard_user', 'contact_comments');
        $this->removeColumn('sf_guard_user', 'patrionimic');
    }
}