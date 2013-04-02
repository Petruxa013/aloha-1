<?php

require_once dirname(__FILE__).'/../lib/clientGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/clientGeneratorHelper.class.php';

/**
 * client actions.
 *
 * @package    aloha
 * @subpackage client
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clientActions extends autoClientActions
{
	public function executeGetTocken(sfWebRequest $request)
	{
		$this->user = $this->getRoute()->getObject();
		$tocken = $this->user->getTocken();

		if (empty($tocken)) {
			$this->user->setTocken($this->generateRandomPassword(30));
			$this->user->save();
		}

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
