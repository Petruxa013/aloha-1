<?php

/**
 * outlet module helper.
 *
 * @package    aloha
 * @subpackage outlet
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class outletGeneratorHelper extends BaseOutletGeneratorHelper
{
	public function linkToParseFile($params)
	{
		return '<i class="icon-upload icon-white"></i>' . link_to(__($params['label'], array(), 'sf_admin'), '@' . $this->getUrlForAction('parseFile'), array('class' => 'btn btn-warning'));
	}
}
