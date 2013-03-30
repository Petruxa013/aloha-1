<?php

/**
 * OutletTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class OutletTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object OutletTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Outlet');
    }

	public function getForList(Doctrine_Query $q)
	{
		$rootAlias = $q->getRootAlias();
		$q->leftJoin($rootAlias . '.Distributor distributor');
		$q->leftJoin($rootAlias . '.Region region');
		$q->leftJoin($rootAlias . '.City city');
		return $q;

	}

	public function getAllWithGeoByUserQuery($user)
	{
		$q = $this->createQuery();
		$rootAlias = $q->getRootAlias();
		$q = $this->getForList($q);
		$q->leftJoin($rootAlias. '.Worksheet worksheet');
		return $q;
	}

}