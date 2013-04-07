<?php

/**
 * client_panel actions.
 *
 * @package    aloha
 * @subpackage client_panel
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class client_panelActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{
		$this->filter = $this->getFilterForm();

		$this->pager = new myPager('Outlet', sfConfig::get('max_items_on_report', 20));
		$this->pager->setQuery(Doctrine::getTable('Outlet')
				->getAllWithGeoByUserQuery($this->getUser()));
		$this->pager->setPage($request->getParameter('page', 1));
		$this->pager->init();

	}

	public function executeFilter(sfWebRequest $request)
	{
		$this->setPage(1);

		if ($request->hasParameter('_reset')) {
			$this->setFilters($this->getFilterDefaults());

			$this->redirect('@client_panel');
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

		$this->setTemplate('index');
	}

	protected function getPager(sfWebRequest $request)
	{
		$pager = new myPager('Outlet', sfConfig::get('app_max_items_on_client_panel'));
		$pager->setQuery($this->buildQuery());
		$pager->setPage($request->getParameter('page', 1));

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
		return new AuditorPanelFilter();
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
