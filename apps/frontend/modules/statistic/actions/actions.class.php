<?php

/**
 * statistic actions.
 *
 * @package    aloha
 * @subpackage statistic
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class statisticActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{
		$this->regions = RegionTable::getInstance()->getAllOrderedQuery()->execute();

	}

	public function executeShowRegion(sfWebRequest $request)
	{
		$this->region = $this->getRoute()->getObject();
	}
}
