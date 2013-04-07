<?php

/**
 * auditor_panel actions.
 *
 * @package    aloha
 * @subpackage auditor_panel
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class auditor_panelActions extends sfActions
{

	public function preExecute()
	{
//		if (!$this->getUser()->hasCredential('auditor')) {
//			$this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
//		}
		parent::preExecute();
	}

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

	public function executeAddWorksheet(sfWebRequest $request)
	{
		$this->outlet = $this->getRoute()->getObject();
		$worksheet = $this->outlet->getWorksheet();
		if (!$worksheet)
			$this->form = new WorksheetForm();
		else
			$this->form = new WorksheetForm($worksheet);
		$this->worksheet = $worksheet;
		if ($request->isMethod('post')) {
			$this->form->getObject()->setOutletId($this->outlet->getId());
			/* если форма новая то записываем создателя */
			if($this->form->isNew())
			{
				$this->form->getObject()->setAuditorId($this->getUser()->getId());
			}
			$this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
			if ($this->form->isValid()) {
//				if($worksheet->getStatus() < 20) {
					$worksheet = $this->form->save();
//					if (is_null($worksheet->getStatus())) {
					$worksheet->setStatus(10);
//					}
					$worksheet->save();
//				}
				$this->setTemplate('worksheet');
				return sfView::SUCCESS;
			}
		}
	}

	public function executeAdditionalFiles()
	{
		$this->outlet = $this->getRoute()->getObject();
		$this->worksheet = $this->outlet->getWorksheet();
		$this->form = new WorksheetForm($this->worksheet);
	}

	public function executeAdditionalFilesRename(sfWebRequest $request)
	{
		$attachment = Doctrine::getTable('Attachment')->findOneById($request->getParameter('attachmentId'));
		if ($attachment) {
			$attachment->setTitle($request->getParameter('title'));
			$attachment->save();
		}

		return sfView::NONE;
	}

	public function executeApproveWorksheet(sfWebRequest $request)
	{
		$user = $this->getUser();
		if(($user->hasCredential('coordinator') || $user->hasCredential('project_manager')) && $request->isMethod('post'))
		{
			$this->outlet = $this->getRoute()->getObject();
			$worksheet = $this->outlet->getWorksheet();
			/* @var $worksheet Worksheet */
			if ($user->hasCredential('coordinator') && $worksheet->getStatus() <= 10) {
				$worksheet->setStatus(20);
				$worksheet->save();
			}

			if ($user->hasCredential('project_manager') && $worksheet->getStatus() <= 20) {
				$worksheet->setStatus(30);
				$worksheet->save();
			}

			if($request->isXmlHttpRequest())
				return $this->returnJSON(array('url' => $this->generateUrl('auditor_panel_approved_worksheet', array('id' => $this->outlet->getId()))));
		}
		else $this->forward404();
	}

	public function executeApprovedWorksheet(sfWebRequest $request)
	{
		$this->outlet = $this->getRoute()->getObject();
		$this->setTemplate('approveWorksheet');
	}

	public function executeDisapproveWorksheet(sfWebRequest $request)
	{
		$user = $this->getUser();
		if(($user->hasCredential('coordinator') || $user->hasCredential('project_manager')) && $request->isMethod('post'))
		{
			$this->outlet = $this->getRoute()->getObject();
			$worksheet = $this->outlet->getWorksheet();
			/* @var $worksheet Worksheet */
			if ($user->hasCredential('coordinator') && $worksheet->getStatus() <= 20) {
				$worksheet->setStatus(null);
				$worksheet->save();
			}
			if ($user->hasCredential('project_manager') && $worksheet->getStatus() <= 30) {
				$worksheet->setStatus(null);
				$worksheet->save();
			}
			if($request->isXmlHttpRequest())
				return $this->returnJSON(array('url' => $this->generateUrl('auditor_panel_disapproved_worksheet', array('id' => $this->outlet->getId()))));

		}
		else $this->forward404();
	}

	public function executeDisapprovedWorksheet(sfWebRequest $request)
	{
		$this->outlet = $this->getRoute()->getObject();
		$this->setTemplate('disapproveWorksheet');
	}


	public function executeApproveWorksheetPhoto(sfWebRequest $request)
	{
		$user = $this->getUser();
		if(($user->hasCredential('coordinator') || $user->hasCredential('project_manager')) && $request->isMethod('post'))
		{
			$this->outlet = $this->getRoute()->getObject();
			$worksheet = $this->outlet->getWorksheet();
			/* @var $worksheet Worksheet */
			if ($user->hasCredential('coordinator') && $worksheet->getPhotoStatus() <= 10) {
				$worksheet->setPhotoStatus(20);
				$worksheet->save();
			}
			if ($user->hasCredential('project_manager') && $worksheet->getPhotoStatus() <= 20) {
				$worksheet->setPhotoStatus(30);
				$worksheet->save();
			}
			if($request->isXmlHttpRequest())
				return $this->returnJSON(array('url' => $this->generateUrl('auditor_panel_worksheet_additional_files', array('id' => $this->outlet->getId()))));

			$this->forward('auditor_panel', 'additionalFiles');
		}
		else $this->forward404();
	}

	public function executeDisapproveWorksheetPhoto(sfWebRequest $request)
	{
		$user = $this->getUser();
		if(($user->hasCredential('coordinator') || $user->hasCredential('project_manager')) && $request->isMethod('post'))
		{
			$this->outlet = $this->getRoute()->getObject();
			$worksheet = $this->outlet->getWorksheet();
			/* @var $worksheet Worksheet */
			if ($user->hasCredential('coordinator') && $worksheet->getPhotoStatus() <= 20) {
				$worksheet->setPhotoStatus(null);
				$worksheet->save();
			}
			if ($user->hasCredential('project_manager') && $worksheet->getPhotoStatus() <= 30) {
				$worksheet->setPhotoStatus(null);
				$worksheet->save();
			}

			if($request->isXmlHttpRequest())
				return $this->returnJSON(array('url' => $this->generateUrl('auditor_panel_worksheet_additional_files', array('id' => $this->outlet->getId()))));

			$this->forward('auditor_panel', 'additionalFiles');
		}
		else $this->forward404();
	}

	public function executeApproveWorksheetAudio(sfWebRequest $request)
	{
		$user = $this->getUser();
		if(($user->hasCredential('coordinator') || $user->hasCredential('project_manager')) && $request->isMethod('post'))
		{
			$this->outlet = $this->getRoute()->getObject();
			$worksheet = $this->outlet->getWorksheet();
			/* @var $worksheet Worksheet */
			if ($user->hasCredential('coordinator') && $worksheet->getAudioStatus() <= 10) {
				$worksheet->setAudioStatus(20);
				$worksheet->save();
			}
			if ($user->hasCredential('project_manager') && $worksheet->getAudioStatus() <= 20) {
				$worksheet->setAudioStatus(30);
				$worksheet->save();
			}

			if($request->isXmlHttpRequest())
				return $this->returnJSON(array('url' => $this->generateUrl('auditor_panel_worksheet_additional_files', array('id' => $this->outlet->getId()))));

			$this->forward('auditor_panel', 'additionalFiles');
		}
		else $this->forward404();
	}

	public function executeDisapproveWorksheetAudio(sfWebRequest $request)
	{
		$user = $this->getUser();
		if(($user->hasCredential('coordinator') || $user->hasCredential('project_manager')) && $request->isMethod('post'))
		{
			$this->outlet = $this->getRoute()->getObject();
			$worksheet = $this->outlet->getWorksheet();
			/* @var $worksheet Worksheet */
			if ($user->hasCredential('coordinator') && $worksheet->getAudioStatus() <= 20) {
				$worksheet->setAudioStatus(null);
				$worksheet->save();
			}
			if ($user->hasCredential('project_manager') && $worksheet->getAudioStatus() <= 30) {
				$worksheet->setAudioStatus(null);
				$worksheet->save();
			}
			if($request->isXmlHttpRequest())
				return $this->returnJSON(array('url' => $this->generateUrl('auditor_panel_worksheet_additional_files', array('id' => $this->outlet->getId()))));

			$this->forward('auditor_panel', 'additionalFiles');
		}
		else $this->forward404();
	}

	public function executeFilter(sfWebRequest $request)
	{
		$this->setPage(1);

		if ($request->hasParameter('_reset')) {
			$this->setFilters($this->getFilterDefaults());

			$this->redirect('@auditor_panel');
		}

		$this->filter = $this->getFilterForm();

		$this->filter->bind($request->getParameter($this->filter->getName()));
		if ($this->filter->isValid()) {
			$this->setFilters($this->filter->getValues());
		}

		$this->pager = $this->getPager($request);
		$filters = array('auditor_panel_filter' => $request->getParameter('auditor_panel_filter'));

		$this->pager->setFilters(http_build_query($filters));
		$this->route = 'auditor_panel_filter';

		$this->setTemplate('index');
	}

	protected function getPager(sfWebRequest $request)
	{
		$pager = new myPager('Outlet', sfConfig::get('app_max_items_on_auditor_panel'));
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
		return $this->getUser()->getAttribute('auditor_panel.filter', $this->getFilterDefaults(), 'auditor_panel_module');
	}

	protected function setFilters(array $filters)
	{
		return $this->getUser()->setAttribute('auditor_panel.filter', $filters, 'auditor_panel_module');
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
		$this->getUser()->setAttribute('auditor_panel.page', $page, 'auditor_panel_module');
	}

	protected function getPage()
	{
		return $this->getUser()->getAttribute('auditor_panel.page', 1, 'auditor_panel_module');
	}

	/**
	 * Метод, отдающий данные в JSON формате
	 * @param Array $output
	 * @return JSON String <sfView::NONE, string>
	 */
	private function returnJSON($output)
	{
		$this->getResponse()->setHttpHeader('Content-type', 'application/json');
		return $this->renderText(json_encode($output));
	}


}
