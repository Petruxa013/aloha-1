<?php

/**
 * Outlet form.
 *
 * @package    aloha
 * @subpackage form
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class OutletForm extends BaseOutletForm
{
	public function configure()
	{
		$this->getWidget('distributor_id')->setOption('order_by', array('name', 'asc'));
		$this->getWidget('region_id')->setOption('order_by', array('name', 'asc'));
		$this->getWidget('city_id')->setOption('order_by', array('name', 'asc'));
	}
}
