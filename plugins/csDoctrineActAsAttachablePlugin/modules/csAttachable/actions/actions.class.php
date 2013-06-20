<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once(dirname(__FILE__) . '/../lib/BasecsAttachableActions.class.php');

/**
 *
 * @package    csDoctrineActAsAttachablePlugin
 * @subpackage module
 * @author     Gordon Franke <gfranke@nevalon.de>
 * @version    SVN: $Id: actions.class.php 25143 2009-12-09 17:58:40Z gimler $
 */
class csAttachableActions extends BasecsAttachableActions
{
	public $table;
	public $object_id;
	public $form;

	protected $return = array();
	protected $returnKey = -1;

	public function executeAttachmentSave(sfWebRequest $request)
	{
		$files = $request->getFiles('attachment');
		$this->setTemplate('iframe');
		if ($this->isUpload($files)) {
			if (!$this->isEmptyFile($files)) {
				$this->bindAttachment($request->getParameter('attachment'), $files);
				if ($this->form->isValid()) {
					$this->form->save();
					$event = 0;
					if ($this->form->getObject()->getType() == 'image')
						$event = 40;

					if ($this->form->getObject()->getType() == 'audio')
						$event = 50;

					History::log($event, $this->form->getObject()->getObject(), $this->getUser());

				} else {
					$errors = $this->form->getErrorList();
					$this->alert = implode("\n", $errors);
				}
			} else {
				$this->alert = 'Пожалуйста выберите файл для загрузки';
			}
		} else {
			$this->bindExternalUrl($request);
			if ($this->form->isValid()) {
				$this->form->save();
			} else {
				$errors = $this->form->getErrorList();
				$this->alert = 'Errors on: ' . implode(", ", array_keys($errors)) . ': ' . implode("\n", $errors);
			}
		}
	}

	public function executeAttachmentMFile(sfWebRequest $request)
	{
		$table = $this->table = $this->getRequestParameter('table');
		$object_id = $this->object_id = $this->getRequestParameter('object_id');

		if ($request->isMethod('GET')) {
			$return = array();

			if ($table && $object_id) {

				$images = ImageAttachmentTable::getInstance()->findByObjectClassAndObjectId($table, $object_id);
				foreach ($images as $file) {
					$this->returnKey++;
					$return[$this->returnKey] = $this->prepareReturnData($file);
				}

				$audio = AudioAttachmentTable::getInstance()->findByObjectClassAndObjectId($table, $object_id);
				foreach ($audio as $file) {
					$this->returnKey++;
					$return[$this->returnKey] = $this->prepareReturnData($file);
				}
			}

			return $this->returnJson(array('files' => $return));

		}

		if ($request->isMethod('POST')) {

			$files = $request->getFiles();

			if ($this->isUpload($files['files'])) {

				foreach ($files['files'] as $key => $file) {
					$this->returnKey++;
					$this->bindMAttachment($file);
					if(isset($this->return[$this->returnKey]['error']))
						continue;

					if ($this->form->isValid()) {
						$this->form->save();
						$event = 0;

						if ($this->form->getObject()->getType() == 'image')
							$event = 40;

						if ($this->form->getObject()->getType() == 'audio')
							$event = 50;

						History::log($event, $this->form->getObject()->getObject(), $this->getUser());

						$this->return[$this->returnKey] = $this->prepareReturnData($this->form->getObject());

					} else {

						$formErrors = array();

						foreach ($this->form->getFormFieldSchema() as $name => $formField)
						{
							if (($error_name = $formField->getError()) != NULL) {
								$formErrors[] = $error_name;
							}

						}

						$this->return[$this->returnKey]['error'] = implode('. ', $formErrors);
						$this->return[$this->returnKey]['name'] = $file['name'];
					}
				}
			}
			return $this->returnJson(array('files' => $this->return));
		}
	}

	protected function prepareReturnData($file)
	{
			/* @var $file ImageAttachment */
			$return_file = new stdClass();
			$return_file->name = $file->getTitle();
			$return_file->size = $file->getSize();
			$return_file->url = $file->getFileUrl();

			$isAudio = $file->getType() == 'audio' ? true : false;
			if(!$isAudio)
				$return_file->thumbnail_url = $file->getAttachmentResizedRoute(10, 10);

			$return_file->delete_url = $this->generateUrl('cs_attachable_delete', array(
				'attachment_id' => $file->getId(),
				'object_id' => $this->object_id,
				'table' => $this->table,
			));

			$return_file->delete_type = 'DELETE';

			return $return_file;
	}

	public function bindMAttachment($file)
	{
		$this->object = $this->getAttachableObject();

		$this->getRequest()->setParameter('attachment_type', $file['type']);

		$attachment = $this->resolveNewAttachmentModel();
		if(is_object($attachment) && in_array(get_class($attachment), array('ImageAttachment', 'AudioAttachment')))
		{
			$this->form = $this->getNewAttachmentForm($attachment, $this->object);
			$values['title'] = $file['name'];
			$values['object_id'] = $this->getRequestParameter('object_id');
			$values['object_class'] = $this->getRequestParameter('table');
			$values['type'] = 'other';

			$this->form->bind($values, array('url' => $file));

			return $this->form;
		}
		// При попытке определить AttachmentModel произошла ошибка, для корректногоответа дополним его данными о файле
		else {
			$this->return[$this->returnKey]['name'] = $file['name'];
		}
	}

	private function resolveNewAttachmentModel()
	{
		$type = $this->getRequestParameter('attachment_type');

		$imageAttacmentMimeTypes = ImageAttachmentForm::$mime_types;

		if(in_array($type, $imageAttacmentMimeTypes))
		{
			$this->getRequest()->setParameter('attachment_type', 'Image');
			return new ImageAttachment();
		}

		$audioAttacmentMimeTypes = AudioAttachmentForm::$mime_types;

		if (in_array($type, $audioAttacmentMimeTypes))
		{
			$this->getRequest()->setParameter('attachment_type', 'Audio');
			return new AudioAttachment();
		}

		$this->return[$this->returnKey]['error'] = 'Неподдерживаемый тип файла: '.$type;

	}


	private function returnJson($return)
	{
		$this->getResponse()->setHttpHeader('Content-type', 'application/json');
		return $this->renderText(json_encode($return));
	}

	public function executeAttachmentDelete(sfWebRequest $request)
	{
		$attachment = Doctrine_Core::getTable('Attachment')->findOneById($this->getRequestParameter('attachment_id'));
		$attachment->delete();

		$event = 0;
		if ($attachment->getType() == 'image')
			$event = 60;

		if ($attachment->getType() == 'audio')
			$event = 70;

		History::log($event, $attachment->getObject(), $this->getUser());


		$files[] = $attachment->getUploadPath();
		if ($attachment->getType() == 'image') {
			$files[] = $attachment->getResizedHalthPath();
			$files[] = $attachment->getResizedMiniPath();
		}

		// set status 10
		$worksheet = $attachment->getObject();
		if ($attachment->getType() == 'image')
			$worksheet->setPhotoStatus(10);
		if ($attachment->getType() == 'audio')
			$worksheet->setAudioStatus(10);
		$worksheet->save();


		foreach ($files as $file) {
			if (file_exists($file))
				unlink($file);
		}

		$this->refreshObject();

		return $this->renderComponent('csAttachable', 'attachments', array('object' => $this->object, 'table' => $this->table, 'javascriptHelper' => $request->getParameter('javascriptHelper', 'Javascript')));
	}
}
