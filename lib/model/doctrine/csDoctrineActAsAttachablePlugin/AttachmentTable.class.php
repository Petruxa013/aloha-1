<?php

/**
 * AttachmentTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AttachmentTable extends PluginAttachmentTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object AttachmentTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Attachment');
    }
}