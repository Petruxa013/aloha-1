<?php

class myUser extends sfGuardSecurityUser
{
	public function __construct($dispatcher, $storage)
	{
		parent::__construct($dispatcher, $storage);
		$this->setCulture('ru_RU');
	}

	/**
	 * Returns the sfGuardUser object's username.
	 *
	 * @return string
	 */
	public function getUsername()
	{
		$user = $this->getGuardUser();
		if($user)
			return $this->getGuardUser()->getUsername();

		return null;
	}

}

