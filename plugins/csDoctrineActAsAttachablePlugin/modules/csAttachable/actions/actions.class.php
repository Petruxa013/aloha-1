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
	public function executeAttachmentSave(sfWebRequest $request)
	{
		$files = $request->getFiles('attachment');
		$this->setTemplate('iframe');
		if ($this->isUpload($files)) {
			if (!$this->isEmptyFile($files)) {
				$this->bindAttachment($request->getParameter('attachment'), $files);
				if ($this->form->isValid()) {
					$this->form->save();
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

	public function executeAttachmentDelete(sfWebRequest $request)
	{
		$attachment = Doctrine_Core::getTable('Attachment')->findOneById($this->getRequestParameter('attachment_id'));
		$attachment->delete();

		$files[] = $attachment->getUploadPath();
		if($attachment->getType() == 'image')
		{
			$files[] = $attachment->getResizedHalthPath();
			$files[] = $attachment->getResizedMiniPath();
		}

		foreach($files as $file)
		{
			if (file_exists($file))
				unlink($file);
		}

		$this->refreshObject();

		return $this->renderComponent('csAttachable', 'attachments', array('object' => $this->object, 'table' => $this->table, 'javascriptHelper' => $request->getParameter('javascriptHelper', 'Javascript')));
	}
}
