<?php

/**
 * security actions.
 *
 * @package    aloha
 * @subpackage security
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class securityActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{
		$this->forward404();
	}

	public function executeCredentials()
	{
		$this->getResponse()->setStatusCode(403);
	}
}
