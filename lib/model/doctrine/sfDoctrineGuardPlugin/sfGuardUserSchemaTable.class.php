<?php

/**
 * sfGuardUserSchemaTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class sfGuardUserSchemaTable extends PluginsfGuardUserSchemaTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object sfGuardUserSchemaTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfGuardUserSchema');
    }
}