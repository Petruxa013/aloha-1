<?php

/**
 * ApplicationAttachmentTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ApplicationAttachmentTable extends PluginApplicationAttachmentTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object ApplicationAttachmentTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ApplicationAttachment');
    }
}