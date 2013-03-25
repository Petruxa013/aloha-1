<?php

class OutletParseFileForm extends BaseForm
{
	public function configure()
	{
		$this->setWidget('filename', new sfWidgetFormInputFile(array(
				'label' => 'Файл списка РТТ',
			)
		));
		$this->getWidgetSchema()->setHelp('filename', 'Поддерживаемый формат файла CSV');

		$this->setValidator('filename', new sfValidatorFile(array(
			'required'             => true,
			'path'                 => 'uploads' . DIRECTORY_SEPARATOR . 'outlets',
//			'mime_types'           => array('text/csv', 'text/comma-separated-values', 'text/plain'),
			'mime_types'           => array('application/xml', 'text/xml','text/plain','application/octet-stream','application/vnd.ms-office','application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/zip'),
			'validated_file_class' => 'sfValidatedFile'
		)));

		$this->getWidgetSchema()->setNameFormat('outlet[%s]');

		$this->disableCSRFProtection();
	}


}