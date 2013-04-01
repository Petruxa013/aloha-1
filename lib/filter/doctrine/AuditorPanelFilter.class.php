<?php
/**
 * Created by JetBrains PhpStorm.
 * User: astronom
 * Date: 01.04.13
 * Time: 19:45
 * To change this template use File | Settings | File Templates.
 */

class AuditorPanelFilter extends OutletFormFilter {

	public function configure()
	{
		parent::configure();
		$this->useFields(array(
			'distributor_id',
			'lagal_name',
			'actual_name',
			'region_id',
			'city_id',
		));

		$this->getWidgetSchema()->setLabels(array(
			'distributor_id' => 'Дистрибьюто',
			'lagal_name' => 'Юридическое название РТТ',
			'actual_name' => 'Название РТТ',
			'region_id' => 'Регион',
			'city_id' => 'Город',

		));

		$this->getWidget('distributor_id')->setOption('order_by', array('name','asc'));
		$this->getWidget('region_id')->setOption('order_by', array('name','asc'));
		$this->getWidget('city_id')->setOption('order_by', array('name','asc'));

		$this->getWidgetSchema()->setNameFormat('auditor_panel_filter[%s]');


		$this->disableCSRFProtection();

	}

}