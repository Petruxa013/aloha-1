<?php
/**
 * Created by JetBrains PhpStorm.
 * User: astronom
 * Date: 01.10.12
 * Time: 1:53
 * To change this template use File | Settings | File Templates.
 */
class myPager extends sfDoctrinePager
{
	protected $filters;

	public function getFilters()
	{
		return '&'.$this->filters;
	}

	public function setFilters($filters = '')
	{
		$this->filters = $filters;
	}


}
