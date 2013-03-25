<?php

class myUser extends sfGuardSecurityUser
{
	public function __construct($dispatcher, $storage)
	{
		parent::__construct($dispatcher, $storage);
		$this->setCulture('ru_RU');
	}
}
