<?php

/**
 * Worksheet filter form.
 *
 * @package    aloha
 * @subpackage filter
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AuditorPanelWorksheetFormFilter extends BaseWorksheetFormFilter
{
	public function configure()
	{
		parent::configure();
		$this->useFields(array(
			'status',
			'photo_status',
			'audio_status',
			'audit_status',
		));

		$this->setWidgets(array(
			'status'       => new sfWidgetFormChoice(array(
				'choices' => array(
					''   => '',
					0 => 'Возвращено или не загружено',
					10   => 'Загружено',
					20   => 'Проверено координатором',
					30   => 'Проверено руководителем'))),
			'photo_status' => new sfWidgetFormChoice(array(
				'choices' => array(
					''   => '',
					0 => 'Возвращено или не загружено',
					10   => 'Загружено',
					20   => 'Проверено координатором',
					30   => 'Проверено руководителем'))),
			'audio_status' => new sfWidgetFormChoice(array(
				'choices' => array(
					''   => '',
					0 => 'Возвращено или не загружено',
					10   => 'Загружено',
					20   => 'Проверено координатором',
					30   => 'Проверено руководителем'))),
			'audit_status' => new sfWidgetFormChoice(array(
				'choices' => array(
					'' => '',
					0  => 'Аудит не проведен',
					10 => 'Аудит проведен частично',
					20 => 'Аудит проведен')))
		));

		$this->setValidators(array(
			'status'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 0, 10, 20, 30))),
			'photo_status' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 0, 10, 20, 30))),
			'audio_status' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 0, 10, 20, 30))),
			'audit_status' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 0, 10, 20,))),
		));

		$this->getWidgetSchema()->setLabels(array(
			'status'       => 'Статус анкеты',
			'photo_status' => 'Статус фото',
			'audio_status' => 'Статус аудита',
			'audit_status' => 'Статус аудита',
		));
	}
}
