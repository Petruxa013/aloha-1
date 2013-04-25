<?php

/**
 * Worksheet form.
 *
 * @package    aloha
 * @subpackage form
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class WorksheetAuditorForm extends BaseWorksheetForm
{
	public function configure()
	{
		$this->useFields(array('auditor_id'));

		$this->setWidget('auditor_id', new sfWidgetFormDoctrineChoice(array('multiple' => false, 'model' => 'sfGuardUser', 'table_method' => 'getActiveAuditorsQuery', 'add_empty' => true), array()));

		$this->getWidgetSchema()->setLabel('auditor_id', 'Аудитор');

		$this->disableCSRFProtection();
	}

	public function updateObject($values = null)
	{
		if (null === $values) {
			$values = $this->values;
		}

		// Если email не указан, то генерируем его автоматически
		if (isset($values['date']) && isset($values['time'])) {
			$this->getObject()->setCreatedAt($values['date'] . ' ' . $values['time']);
		}

		$values = $this->processValues($values);

		$this->doUpdateObject($values);

		// embedded forms
		$this->updateObjectEmbeddedForms($values);

		return $this->getObject();
	}

}
