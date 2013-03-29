<?php

class myUser extends sfGuardSecurityUser
{

	public static $groupRus = array(
		'auditor' => 'Аудитор',
		'coordinator' => 'Координатор',
		'project_manager' => 'Руководитель проекта',
		'client'    => 'Клиент',
		'client_manager' => 'Представитель клиента',
		'admin' => 'Администратор'
	);

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
		if ($user)
			return $this->getGuardUser()->getUsername();

		return null;
	}

	public function getFio()
	{
		$user = $this->getGuardUser();
		if ($user)
			return $user->getName();

		return null;

	}

	public function getRusGroup()
	{
		$groupNames = $this->getGroupNames();
		$group = '';
		foreach($groupNames as $name)
		{
			if(isset(self::$groupRus[$name]))
				$group .= self::$groupRus[$name]. ' ';
		}

		return $group;
	}

	public function getCoordinator()
	{
		return 'todo';
	}

	public function getId()
	{
		$user = $this->getGuardUser();
		if ($user)
			return $user->getId();

		return null;
	}

}

