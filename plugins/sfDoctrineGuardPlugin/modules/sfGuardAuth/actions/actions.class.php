<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once(dirname(__FILE__) . '/../lib/BasesfGuardAuthActions.class.php');

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 23319 2009-10-25 12:22:23Z Kris.Wallsmith $
 */
class sfGuardAuthActions extends BasesfGuardAuthActions
{
	public function executeSigninByTocken(sfWebRequest $request)
	{
		$user = $this->getUser();
		if ($user->isAuthenticated()) {
			return $this->redirect('@homepage');
		}

		$tocken = $request->getParameter('tocken');

		$user = sfGuardUserTable::getInstance()->findOneByTocken($tocken);
		if($user)
		{
			$this->getUser()->signin($user);
			$signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $user->getReferer($request->getReferer()));

			return $this->redirect('' != $signinUrl ? $signinUrl : '@homepage');
		}

		$closeDoorUrl = sfConfig::get('app_sf_guard_plugin_close_door_url', '@homepage');

		return $this->redirect($closeDoorUrl);

	}
}
