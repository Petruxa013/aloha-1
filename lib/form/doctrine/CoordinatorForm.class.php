<?php
/**
 * Created by JetBrains PhpStorm.
 * User: astronom
 * Date: 26.03.13
 * Time: 1:28
 * To change this template use File | Settings | File Templates.
 */

class CoordinatorForm extends sfGuardUserForm
{

	public function configure()
	{
		parent::configure();
		$this->useFields(array(
			'first_name',
			'last_name',
			'email_address',
			'patrionimic',
			'contact_comments',
			'masters_list',
			'is_active',
		));

		$this->setWidget('contact_comments', new sfWidgetFormTextarea());

		$this->setWidget('masters_list', new sfWidgetFormDoctrineChoice(array('multiple' => false, 'model' => 'sfGuardUser', 'table_method' => 'getActiveProjectManagersQuery', 'add_empty' => true)));

		$this->setValidators(array(
			'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
			'first_name'       => new sfValidatorString(array('max_length' => 255, 'required' => true)),
			'last_name'        => new sfValidatorString(array('max_length' => 255, 'required' => true)),
			'email_address'    => new sfValidatorEmail(array('max_length' => 255, 'required' => false)),
			'patrionimic'      => new sfValidatorString(array('max_length' => 255, 'required' => true)),
			'contact_comments' => new sfValidatorString(array('max_length' => 255, 'required' => true)),
			'masters_list'     => new sfValidatorDoctrineChoice(array('multiple' => false, 'model' => 'sfGuardUser', 'required' => true)),
		));

		$this->getValidator('first_name')->setMessages(array('required' => 'Обязательно к заполнению'));
		$this->getValidator('last_name')->setMessages(array('required' => 'Обязательно к заполнению'));
		$this->getValidator('email_address')->setMessages(array('required' => 'Обязательно к заполнению'));


		$this->widgetSchema->moveField('patrionimic', sfWidgetFormSchema::AFTER, 'first_name');
		$this->widgetSchema->moveField('last_name', sfWidgetFormSchema::FIRST);
		$this->getWidgetSchema()->setLabel('masters_list', 'Руководители проекта');


//		$this->validatorSchema->setPostValidator(
//			new sfValidatorAnd(array(
//				new sfValidatorDoctrineUnique(array('model' => 'sfGuardUser', 'column' => array('email_address'))),
//				new sfValidatorDoctrineUnique(array('model' => 'sfGuardUser', 'column' => array('username'))),
//			))
//		);

		$this->disableCSRFProtection();
	}

	protected function doSave($con = null)
	{

		$auditor = $this->getObject();
		$auditor->setUsername('coordinator_' . mt_rand(1000, 9999));
		$auditor->setPassword($this->generateRandomPassword(14));
		$auditor->setTocken($this->generateRandomPassword(30));

		parent::doSave($con);

		if(!$auditor->hasGroup('coordinator'))
			$auditor->addGroupByName('coordinator');
	}

	/**
	 * Updates the values of the object with the cleaned up values.
	 *
	 * @param  array $values An array of values
	 *
	 * @return mixed The current updated object
	 */
	public function updateObject($values = null)
	{
		if (null === $values) {
			$values = $this->values;
		}

		// Если email не указан, то генерируем его автоматически
		if (isset($values['email_address']) && empty($values['email_address'])) {
			$values['email_address'] = $this->generateRandomPassword(14) . '@nomail.com';
		}

		$values = $this->processValues($values);

		$this->doUpdateObject($values);

		// embedded forms
		$this->updateObjectEmbeddedForms($values);

		return $this->getObject();
	}

	public function saveMastersList($con = null)
	{
		if (!$this->isValid()) {
			throw $this->getErrorSchema();
		}

		if (!isset($this->widgetSchema['masters_list'])) {
			// somebody has unset this widget
			return;
		}

		if (null === $con) {
			$con = $this->getConnection();
		}

		$existing = $this->object->Masters->getPrimaryKeys();
		$values = $this->getValue('masters_list');
		if (!is_array($values)) {
			$values = array($values);
		}

		$unlink = array_diff($existing, $values);
		if (count($unlink)) {
			$this->object->unlink('Masters', array_values($unlink));
		}

		$link = array_diff($values, $existing);
		if (count($link)) {
			$this->object->link('Masters', array_values($link));
		}
	}


	/**
	 * Returns a random password.
	 *
	 * @param int $len The key length
	 * @return string
	 */
	private function generateRandomPassword($len = 20)
	{
		return substr(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36), 0, $len);
	}

}