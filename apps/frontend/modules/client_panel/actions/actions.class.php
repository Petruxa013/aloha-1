<?php

/**
 * client_panel actions.
 *
 * @package    aloha
 * @subpackage client_panel
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
require_once sfConfig::get('sf_lib_dir').DS.'helper'.DS.'StatusHelper.php';
require_once sfConfig::get('sf_lib_dir').DS.'helper'.DS.'WorksheetHelper.php';

class client_panelActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{
		// sorting
		if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort'))) {
			$this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
		}

		$this->filter = $this->getFilterForm();

		$query = Doctrine::getTable('Outlet')
						->getAllWithGeoByUserQuery($this->getUser());
		$query = $this->addSortQuery($query, true);

		$this->pager = new myPager('Outlet', sfConfig::get('max_items_on_report', 20));
		$this->pager->setQuery($query);
		$this->pager->setPage($request->getParameter('page', 1));
		$this->pager->init();
		$this->setPage($request->getParameter('page', 1));

		$this->route = 'client_panel';

		$this->sort = $this->getSort();

	}

	public function executeFilter(sfWebRequest $request)
	{
		$this->setPage(1);

		if ($request->hasParameter('_reset')) {
			$this->setFilters($this->getFilterDefaults());

			$this->redirect('@client_panel');
		}

		// sorting
		if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort'))) {
			$this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
		}

		$this->filter = $this->getFilterForm();

		$this->filter->bind($request->getParameter($this->filter->getName()));
		if ($this->filter->isValid()) {
			$this->setFilters($this->filter->getValues());
		}

		$this->pager = $this->getPager($request);
		$filters = array('client_panel_filter' => $request->getParameter('client_panel_filter'));

		$this->pager->setFilters(http_build_query($filters));
		$this->route = 'client_panel_filter';
		$this->sort = $this->getSort();

		$this->setTemplate('index');
	}

	public function executeExportExcel(sfWebRequest $request)
	{
		$this->filter = $this->getFilterForm();

		$this->filter->bind($request->getParameter($this->filter->getName()));
		if ($this->filter->isValid()) {

			$filename = 'cordiant_otchet_' . date('d_m_Y') . '.xlsx';
			$filepath = sfConfig::get('sf_data_dir') . DS . 'otchet' . DS;
			if (!is_dir($filepath))
				mkdir($filepath, 0755, true);

			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("allclients.ru");
			$objPHPExcel->getProperties()->setLastModifiedBy("allclients.ru");
			$objPHPExcel->getProperties()->setTitle("Отчет по аудиту коипании ОАО Кордиант");
			$objPHPExcel->getProperties()->setSubject("Отчет по аудиту коипании ОАО Кордиант");
			$objPHPExcel->getProperties()->setDescription("Отчет по аудиту коипании ОАО Кордиант");
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objPHPExcel->setActiveSheetIndex(0);

			$excelWorksheet = $objPHPExcel->getActiveSheet();
			$excelWorksheet->setTitle('РТТ');

			$excelWorksheet->SetCellValue('A1', 'Дистрибьютор');
			$excelWorksheet->SetCellValue('B1', 'Юридическое название РТТ!');
			$excelWorksheet->SetCellValue('C1', 'Название РТТ');
			$excelWorksheet->SetCellValue('D1', 'Адрес');
			$excelWorksheet->SetCellValue('E1', 'Регион');
			$excelWorksheet->SetCellValue('F1', 'Город');
			$excelWorksheet->SetCellValue('G1', 'Тип РТТ');
			$excelWorksheet->SetCellValue('H1', 'Группа');
			$excelWorksheet->SetCellValue('I1', 'Наличие SKU в торговой точке (в торговом зале или на складе)');
			$excelWorksheet->SetCellValue('J1', 'Наличие минимального кол-ва = 4 шт (торговый зал + склад)');
			$excelWorksheet->SetCellValue('K1', 'Результат');

			$outlets = $this->buildQuery()->execute();

			/* @var $outlet Outlet */
			foreach ($outlets as $i => $outlet) {
				$k = $i + 2;
				$excelWorksheet->SetCellValue('A' . $k, $outlet->getDistributor()->getName());
				$excelWorksheet->SetCellValue('B' . $k, $outlet->getLagalName());
				$excelWorksheet->SetCellValue('C' . $k, $outlet->getActualName());
				$excelWorksheet->SetCellValue('D' . $k, $outlet->getAddress());
				$excelWorksheet->SetCellValue('E' . $k, $outlet->getRegion()->getName());
				$excelWorksheet->SetCellValue('F' . $k, $outlet->getCity()->getName());
				$excelWorksheet->SetCellValue('G' . $k, $outlet->getHumanType());
				$excelWorksheet->SetCellValue('H' . $k, strtoupper($outlet->getGroupType()));
				$excelWorksheet->SetCellValue('I' . $k, count_worksheet_sku_a($outlet->getWorksheet()));
				$excelWorksheet->SetCellValue('J' . $k, count_worksheet_sku_b($outlet->getWorksheet()));
				$excelWorksheet->SetCellValue('K' . $k, worksheet_audit_simple_status($outlet, true));
			}

			$boldFont = array(
				'font' => array(
					'bold' => true
				)
			);
			//и позиционирование
			$center = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_TOP
				)
			);
			// установим жирный шрифт для заголовков
			// и заодно отцентрируем
			foreach (range('a', 'k') as $letter) {
				$excelWorksheet->getStyle($letter . '1')->applyFromArray($boldFont)
						->applyFromArray($center);
			}

			// Среднее арифметическое по дистрибьюторам.
			// По всем точкам одного дистрибьютора считается ср. арифметическое по полю
			// "Наличие минимального кол-ва = 4 шт (торговый зал + склад)"
			$excelWorksheet = $objPHPExcel->createSheet(1);
			$excelWorksheet->setTitle('Среднее по дистрибьюторам');

			$excelWorksheet->SetCellValue('A1', 'Дистрибьютор');
			$excelWorksheet->SetCellValue('B1', 'Среднее по "Наличие минимального кол-ва = 4 шт (торговый зал + склад)"!');

			$distributors = DistributorTable::getInstance()->findAll();
			/* @var $distributor Distributor */
			foreach ($distributors as $i => $distributor) {
				$k = $i + 2;
				$excelWorksheet->SetCellValue('A' . $k, $distributor->getName());
				$excelWorksheet->SetCellValue('B' . $k, count_worksheet_sku_b_average_by_outlets($distributor->getOutlets()));
			}

			// установим жирный шрифт для заголовков
			// и заодно отцентрируем
			foreach (range('a', 'b') as $letter) {
				$excelWorksheet->getStyle($letter . '1')->applyFromArray($boldFont)
						->applyFromArray($center);
			}

			$objWriter->save($filepath . $filename);

			// redirect output to client browser
			$response = $this->getResponse();
			$response->setHttpHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			$response->setHttpHeader('Content-Disposition', 'attachment;filename="' . $filename . '"');
			$response->setHttpHeader('Cache-Control', 'max-age=0');
			$response->setContent(file_get_contents($filepath . $filename));

			return sfView::NONE;
		} else $this->forward404();

	}

	protected function isValidSortColumn($column)
	{
		return Doctrine_Core::getTable('outlet')->hasColumn($column);
	}

	protected function addSortQuery($query, $return = false)
	{
		$sort = $this->getSort();
		if (empty($sort) || empty($sort[0])) {
			return;
		}

		if (!in_array(strtolower($sort[1]), array('asc', 'desc'))) {
			$sort[1] = 'asc';
		}

		$query->addOrderBy($sort[0] . ' ' . $sort[1]);

		if($return)
			return $query;
	}

	protected function getSort()
	{
		if (null !== $sort = $this->getUser()->getAttribute('client_panel.sort', array(0 => null), 'client_panel_module')) {
			return $sort;
		}

		$this->setSort(array(0 => null));

		return $this->getUser()->getAttribute('client_panel.sort', array(0 => null), 'client_panel_module');
	}

	protected function setSort(array $sort)
	{
		if (null !== $sort[0] && null === $sort[1]) {
			$sort[1] = 'asc';
		}

		$this->getUser()->setAttribute('client_panel.sort', $sort, 'client_panel_module');
	}

	protected function getPager(sfWebRequest $request)
	{
		$pager = new myPager('Outlet', sfConfig::get('app_max_items_on_client_panel'));
		$pager->setQuery($this->buildQuery());
		$pager->setPage($request->getParameter('page', 1));
		$this->setPage($request->getParameter('page', 1));

		$pager->init();

		return $pager;
	}


	protected function buildQuery()
	{
		if ($this->filter === null) {
			$this->filter = $this->getFilterForm($this->getFilters());
		}

		$query = $this->filter->buildQuery($this->getFilters());
		/* @var $query Doctrine_Query */
		$query = Doctrine::getTable('Outlet')
				->getAllWithGeoByUserQuery($this->getUser(), $query);

		$query = $this->addSortQuery($query, true);

		return $query;
	}


	protected function getFilters()
	{
		return $this->getUser()->getAttribute('client_panel.filter', $this->getFilterDefaults(), 'client_panel_module');
	}

	protected function setFilters(array $filters)
	{
		return $this->getUser()->setAttribute('client_panel.filter', $filters, 'client_panel_module');
	}

	private function getFilterDefaults()
	{
		return array();
	}

	private function getFilterForm()
	{
		return new ClientPanelFilter();
	}

	protected function setPage($page)
	{
		$this->getUser()->setAttribute('client_panel.page', $page, 'client_panel_module');
	}

	protected function getPage()
	{
		return $this->getUser()->getAttribute('client_panel.page', 1, 'client_panel_module');
	}

	public function executeShowWorksheet(sfWebRequest $request)
	{
		$this->forward404Unless($this->outlet = $this->getRoute()->getObject());
		$this->forward404Unless($this->worksheet = $this->outlet->getWorksheet());
		$this->form = new WorksheetForm($this->worksheet);

	}

}
