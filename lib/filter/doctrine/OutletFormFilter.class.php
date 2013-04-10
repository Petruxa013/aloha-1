<?php

/**
 * Outlet filter form.
 *
 * @package    aloha
 * @subpackage filter
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class OutletFormFilter extends BaseOutletFormFilter
{
	public function configure()
	{
		$this->getWidget('distributor_id')->setOption('order_by', array('name', 'asc'));
		$this->getWidget('region_id')->setOption('order_by', array('name', 'asc'));
		$this->getWidget('city_id')->setOption('order_by', array('name', 'asc'));
		$this->getWidget('type')->setOption('choices', array('' => '', 'specialized' => 'СШМ', 'auto' => 'Авто', 'market' => 'Рынок'));

	}
}
