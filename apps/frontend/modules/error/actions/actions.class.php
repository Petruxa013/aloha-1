<?php

/**
 * error actions.
 *
 * @package    Insurance
 * @subpackage error
 * @author     Alexander Manichev aka @astronom <a.manichev@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class errorActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{
		$this->forward404('default');
	}

	public function executeError404(sfWebRequest $request)
	{

	}
}
