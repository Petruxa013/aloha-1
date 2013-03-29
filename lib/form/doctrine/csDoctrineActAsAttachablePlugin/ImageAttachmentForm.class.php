<?php

/**
 * ImageAttachment form.
 *
 * @package    aloha
 * @subpackage form
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ImageAttachmentForm extends AttachmentForm
{
	/**
	 * @see AttachmentForm
	 */
	public function configure()
	{
		parent::configure();
		$this->getWidget('url')->setLabel('Файл');
		$this->getValidator('url')->setOption('max_size', 10 * 1024 * 1024);
		$this->getValidator('url')->setOption('path', $this->getBaseUploadPath());
		$this->getValidator('url')->setOption('mime_types', array(
					'image/jpeg',
					'image/pjpeg',
					'image/png',
					'image/x-png',
					'image/gif',
				));
	}

	public function updateObject($values = null)
	{
		if (null === $values) {
			$values = $this->values;
		}

		// Если email не указан, то генерируем его автоматически
		if (isset($values['type'])) {
			$values['type'] = 'image';
		}

		$values = $this->processValues($values);

		$this->doUpdateObject($values);

		// embedded forms
		$this->updateObjectEmbeddedForms($values);

		return $this->getObject();
	}


	protected function doSave($con = NULL)
	{
		$object = parent::doSave($con);

		$image = $this->getObject();
		$imagePath = $image->getUploadPath();

		$thumb = new sfImage($imagePath);

		$imageWidth = $thumb->getWidth();
		$imageHeigh = $thumb->getHeight();

		$thumb->resize(floor($imageWidth*0.5), floor($imageHeigh*0.5));
		$thumb->saveAs($image->getResizedHalthPath());

		$thumb->resize(floor($imageWidth*0.1), floor($imageHeigh*0.1));
		$thumb->saveAs($image->getResizedMiniPath());

		return $object;

	}
}
