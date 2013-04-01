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
			$group .= UserHelper::humanGroupName($name). ' ';
		}

		return $group;
	}

	public function getCoordinator()
	{
		$user = $this->getGuardUser();
		$coordinatorName = '';
		if($user) {
			$coordinators = $user->getMasters();
			if($coordinators)
				foreach($coordinators as $coordinator)
					$coordinatorName .= $coordinator->getName();
		return $coordinatorName;
		}

		return null;
	}

	public function getId()
	{
		$user = $this->getGuardUser();
		if ($user)
			return $user->getId();

		return null;
	}

	public function getRegionIds()
	{
		$regionIds = array();

		if($regions = $this->getRegions())
		{
			foreach($regions as $region)
				$regionIds[] = $region->getId();
		}

		return $regionIds;

	}

	public function getRegions()
	{
		$user = $this->getGuardUser();
		if ($user)
		{
			$regions = $user->getRegions();
			return $regions;
		}

		return false;
	}

	public function getCityIds()
	{
		$cityIds = array();

		if($cities = $this->getCities())
		{
			foreach($cities as $city)
				$cityIds[] = $city->getId();
		}

		return $cityIds;

	}

	public function getCities()
	{
		$user = $this->getGuardUser();
		if ($user)
		{
			$cities = $user->getCities();
			return $cities;
		}

		return false;
	}

}

