<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class PluginAttachment extends BaseAttachment
{
  public function __toString()
  {
    return $this->name;
  }

  public function getObject()
  {
    return Doctrine_Core::getTable($this->getObjectClass())->findOneById($this->getObjectId());
  }

  public function getDefaultFilepath()
  {
    return str_replace(sfConfig::get('sf_web_dir'), '',  $this->getUploadPath());
  }

  public function getUploadPath()
  {
    return $this->getBaseUploadPath().$this->getUrl();
  }

  public function getBaseUploadPath()
  {
    return sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . strtolower($this->getObjectClass()) . DIRECTORY_SEPARATOR;
  }

  public function getAttachmentRoute()
  {
    return $this->getDefaultFilepath();
  }
  
  public function getSize()
  {
    return filesize($this->getUploadPath());
  }
  
  public function getContentType()
  {
    return $this['type'] != 'other' ? $this['type'] : $this->getExtension();
  }
  
  public function getExtension()
  {
    return substr($this['url'], strrpos($this['url'], '.') + 1);
  }
}
