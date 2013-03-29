<?php

/**
 * Worksheet form.
 *
 * @package    aloha
 * @subpackage form
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class WorksheetForm extends BaseWorksheetForm
{
	public function configure()
	{
		unset($this['updated_at'], $this['created_at'], $this['outlet_id'], $this['auditor_id']);

		$this->getWidget('outlet_manager')->setAttributes(array('class' => 'input-block-level', 'placeholder' => 'Иванов Иван Иванович'));
		$this->getWidget('outlet_manager_position')->setAttributes(array('class' => 'input-block-level', 'placeholder' => 'Зиц-Председатель'));
		$this->getWidget('outlet_phone')->setAttributes(array('class' => 'input-block-level', 'placeholder' => '+7 895 556 67 45'));
		$this->setWidget('comment', new sfWidgetFormTextarea(array(), array('cols' => 7, 'rows' => 4, 'class' => 'input-block-level', 'placeholder' => 'Здесь вы можите указать на неточность адреса, и других данных РТТ. Сложностей, с которыми вы столкнулись во время аудита')));

		$this->setWidget('date', new sfWidgetFormDate(array('format' => '%day%.%month%.%year%', 'can_be_empty' => false), array('style' => 'width: auto')));
		$this->setWidget('time', new sfWidgetFormTime(array('with_seconds' => false, 'can_be_empty' => false), array('style' => 'width: auto')));

		$this->setValidator('date', new sfValidatorDate());
		$this->setValidator('time', new sfValidatorTime());

		$this->disableCSRFProtection();
	}

	public function updateObject($values = null)
	{
		if (null === $values) {
			$values = $this->values;
		}

		// Если email не указан, то генерируем его автоматически
		if (isset($values['date']) && isset($values['time'])) {
			$this->getObject()->setCreatedAt($values['date']. ' ' . $values['time']);
		}

		$values = $this->processValues($values);

		$this->doUpdateObject($values);

		// embedded forms
		$this->updateObjectEmbeddedForms($values);

		return $this->getObject();
	}

}
