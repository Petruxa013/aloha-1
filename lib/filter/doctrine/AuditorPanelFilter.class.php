<?php
/**
 * Created by JetBrains PhpStorm.
 * User: astronom
 * Date: 01.04.13
 * Time: 19:45
 * To change this template use File | Settings | File Templates.
 */

class AuditorPanelFilter extends OutletFormFilter
{

	public function configure()
	{
		parent::configure();
		$this->useFields(array(
			'distributor_id',
			'lagal_name',
			'actual_name',
			'address',
			'region_id',
			'city_id',
		));

		$auditorPanelWorksheetFormFilter = new AuditorPanelWorksheetFormFilter();
		$this->mergeForm($auditorPanelWorksheetFormFilter);

		$this->getWidgetSchema()->setLabels(array(
			'distributor_id' => 'Дистрибьютор',
			'lagal_name'     => 'Юридическое название РТТ',
			'actual_name'    => 'Название РТТ',
			'address'        => 'Адрес',
			'region_id'      => 'Регион',
			'city_id'        => 'Город',
		));

		$this->getWidget('distributor_id')->setOption('order_by', array('name', 'asc'));
		$this->getWidget('region_id')->setOption('order_by', array('name', 'asc'));
		$this->getWidget('city_id')->setOption('order_by', array('name', 'asc'));

		$this->getWidgetSchema()->setNameFormat('auditor_panel_filter[%s]');


		$this->disableCSRFProtection();

	}

	protected function doBuildQuery(array $values)
	{

		/* @var $t Doctrine_Query */
		$query = parent::doBuildQuery($values);

		$allStatus = array();
		if (isset($values['status']) && !is_null($values['status'])) {
			$status = (int)$values['status'] == 0 ? null : (int)$values['status'];
			$allStatus['status'] = $status;
		}
		if (isset($values['photo_status']) && !is_null($values['photo_status'])) {
			$photoStatus = (int)$values['photo_status'] == 0 ? null : (int)$values['photo_status'];
			$allStatus['photo_status'] = $photoStatus;
		}
		if (isset($values['audio_status']) && !is_null($values['audio_status'])) {
			$audioStatus = (int)$values['audio_status'] == 0 ? null : (int)$values['audio_status'];
			$allStatus['audio_status'] = $audioStatus;
		}
		if (isset($values['audit_status']) && !is_null($values['audit_status'])) {
			$auditStatus = (int)$values['audit_status'] == 0 ? null : (int)$values['audit_status'];
			$allStatus['audit_status'] = $auditStatus;
		}

		$worksheet_outlet_ids = array();
		$filterByStatus = false;
		if (!empty($allStatus)) {
			$filterByStatus = true;
			$worksheets = WorksheetTable::getInstance()->findByAllStatus($allStatus, Doctrine::HYDRATE_ARRAY);
			if (!empty($worksheets)) {
				foreach ($worksheets as $worksheet) {
					$worksheet_outlet_ids[] = $worksheet['outlet_id'];
				}
			}
		}

		$worksheet_outlet_ids_by_auditor = array();
		$filterByAuditor = false;
		if(isset($values['auditor_id']) && !is_null($values['auditor_id']))
		{
			$filterByAuditor = true;
			$worksheets = WorksheetTable::getInstance()->findByAuditorId($values['auditor_id'], Doctrine::HYDRATE_ARRAY);
			if (!empty($worksheets)) {
				foreach ($worksheets as $worksheet) {
					$worksheet_outlet_ids_by_auditor[] = $worksheet['outlet_id'];
				}
			}

		}

		// Фильтры по статусу и по аудитору
		if($filterByAuditor && $filterByStatus)
		{
			// Получаем только пересекающиеся массивы в фильтрации по статусам и аудиторам
			$worksheet_outlet_ids = array_intersect($worksheet_outlet_ids, $worksheet_outlet_ids_by_auditor);
			// Выбираем уникальные элементы
			$worksheet_outlet_ids = array_unique($worksheet_outlet_ids);
		}

		// Фильтр только по аудитору
		if($filterByAuditor && !$filterByStatus)
		{
			$worksheet_outlet_ids = array_unique($worksheet_outlet_ids_by_auditor);
		}

		// Фильтр только по статусам
		if(!$filterByAuditor && $filterByStatus)
		{
			$worksheet_outlet_ids = array_unique($worksheet_outlet_ids);
		}

		if (!empty($worksheet_outlet_ids))
			$query->whereIn(sprintf('%s.%s', $query->getRootAlias(), 'id'), $worksheet_outlet_ids);
		elseif(!empty($allStatus))
			$query->whereIn(sprintf('%s.%s', $query->getRootAlias(), 'id'), array(0));

		return $query;
	}
}