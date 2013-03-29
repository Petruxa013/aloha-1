<?php

/**
 * Attachment form.
 *
 * @package    aloha
 * @subpackage form
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AttachmentForm extends PluginAttachmentForm
{
	public function configure()
	{
		$this->setButton('Загрузить');
		$this->disableCSRFProtection();
	}

	protected function getBaseUploadPath()
	{
		$basePath = sfConfig::get('sf_upload_dir') . DS . strtolower($this->getObjectClass()) . DS . $this->getObjectId() . DS;

		return $basePath;
	}

}
