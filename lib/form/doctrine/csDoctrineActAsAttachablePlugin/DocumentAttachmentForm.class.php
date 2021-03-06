<?php

/**
 * DocumentAttachment form.
 *
 * @package    aloha
 * @subpackage form
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DocumentAttachmentForm extends PluginDocumentAttachmentForm
{
	/**
	 * @see AttachmentForm
	 */
	public function configure()
	{
		parent::configure();
		$this->getWidget('url')->setLabel('Файл');
		$this->getValidator('url')->setOption('max_size', 31457280);

	}
}
