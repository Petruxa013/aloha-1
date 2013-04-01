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
		/* @var $worksheet Worksheet */
		if ($this->getObjectClass() && $this->getObjectId())
		{
			$worksheet = Doctrine::getTable($this->getObjectClass())->findOneById($this->getObjectId());

			$outlet = $worksheet->getOutlet();

			$basePath = sfConfig::get('sf_upload_dir') . DS .
					strtolower($this->getObjectClass()) . DS .
					SlugifyClass::slugify($outlet->getRegion()) . DS .
					SlugifyClass::slugify($outlet->getCity()) . DS .
					SlugifyClass::slugify($outlet->getAddress()) . DS;

			return $basePath;
		}
		else return null;
	}

}
