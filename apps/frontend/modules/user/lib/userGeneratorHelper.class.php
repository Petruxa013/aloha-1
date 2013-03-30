<?php

/**
 * user module helper.
 *
 * @package    aloha
 * @subpackage user
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userGeneratorHelper extends BaseUserGeneratorHelper
{
	public function linkToNewAuditor($params)
	{
		return link_to('<i class="icon-plus icon-white"></i> ' . __($params['label'], array(), 'sf_admin'), '@' . $this->getUrlForAction('newAuditor'), array('class' => 'btn btn-info'));
	}

	public function linkToNewCoordinator($params)
	{
		return link_to('<i class="icon-plus icon-white"></i> ' . __($params['label'], array(), 'sf_admin'), '@' . $this->getUrlForAction('newCoordinator'), array('class' => 'btn btn-info'));
	}

}
