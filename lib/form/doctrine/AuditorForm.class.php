<?php
/**
 * Created by JetBrains PhpStorm.
 * User: astronom
 * Date: 26.03.13
 * Time: 1:28
 * To change this template use File | Settings | File Templates.
 */

class AuditorForm extends sfGuardUserForm
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
		));

		$this->setWidget('contact_comments', new sfWidgetFormTextarea());

		$this->setValidators(array(
			'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
			'first_name'       => new sfValidatorString(array('max_length' => 255, 'required' => true)),
			'last_name'        => new sfValidatorString(array('max_length' => 255, 'required' => true)),
			'email_address'    => new sfValidatorEmail(array('max_length' => 255, 'required' => false)),
			'patrionimic'      => new sfValidatorString(array('max_length' => 255, 'required' => true)),
			'contact_comments' => new sfValidatorString(array('max_length' => 255, 'required' => true)),
		));

		$this->getValidator('first_name')->setMessages(array('required' => 'Обязательно к заполнению'));
		$this->getValidator('last_name')->setMessages(array('required' => 'Обязательно к заполнению'));
		$this->getValidator('email_address')->setMessages(array('required' => 'Обязательно к заполнению'));


		$this->widgetSchema->moveField('patrionimic', sfWidgetFormSchema::AFTER, 'first_name');
		$this->widgetSchema->moveField('last_name', sfWidgetFormSchema::FIRST);

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
		$auditor->setUsername('auditor_' . mt_rand(1000, 9999));
		$auditor->setPassword($this->generateRandomPassword(14));
		$auditor->setTocken($this->generateRandomPassword(30));

		parent::doSave($con);
		$auditor->addGroupByName('auditor');
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