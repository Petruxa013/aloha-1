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
		$this->outlets = OutletTable::getInstance()->getAllWithGeoByUserQuery($this->getUser())->execute();
	}

	public function executeAddWorksheet(sfWebRequest $request)
	{
		$this->outlet = $this->getRoute()->getObject();
		$worksheet = $this->outlet->getWorksheet();
		if(!$worksheet)
			$this->form = new WorksheetForm();
		else
			$this->form = new WorksheetForm($worksheet);

		if($request->isMethod('post'))
		{
			$this->form->getObject()->setOutletId($this->outlet->getId());
			$this->form->getObject()->setAuditorId($this->getUser()->getId());
			$this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
			if ($this->form->isValid()) {
					$worksheet = $this->form->save();
					$this->setTemplate('worksheet');
					return sfView::SUCCESS;
			}
		}
	}

	public function executeNew(sfWebRequest $request)
	{
		$this->form = new WorksheetForm();
		$this->worksheet = $this->form->getObject();
	}

	public function executeCreate(sfWebRequest $request)
	{
		$this->form = new WorksheetForm();
		$this->worksheet = $this->form->getObject();

		$this->processForm($request, $this->form);

		$this->setTemplate('new');
	}

	public function executeEdit(sfWebRequest $request)
	{
		$this->worksheet = $this->getRoute()->getObject();
		$this->form = $this->configuration->getForm($this->worksheet);
	}

	public function executeUpdate(sfWebRequest $request)
	{
		$this->worksheet = $this->getRoute()->getObject();
		$this->form = $this->configuration->getForm($this->worksheet);

		$this->processForm($request, $this->form);

		$this->setTemplate('edit');
	}

	public function executeDelete(sfWebRequest $request)
	{
		$request->checkCSRFProtection();

		$this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

		if ($this->getRoute()->getObject()->delete()) {
			$this->getUser()->setFlash('notice', 'The item was deleted successfully.');
		}

		$this->redirect('@worksheet');
	}

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid()) {
			$notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

			try {
				$worksheet = $form->save();
			} catch (Doctrine_Validator_Exception $e) {

				$errorStack = $form->getObject()->getErrorStack();

				$message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ? 's' : null) . " with validation errors: ";
				foreach ($errorStack as $field => $errors) {
					$message .= "$field (" . implode(", ", $errors) . "), ";
				}
				$message = trim($message, ', ');

				$this->getUser()->setFlash('error', $message);
				return sfView::SUCCESS;
			}

			$this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $worksheet)));

			if ($request->hasParameter('_save_and_add')) {
				$this->getUser()->setFlash('notice', $notice . ' You can add another one below.');

				$this->redirect('@worksheet_new');
			} else {
				$this->getUser()->setFlash('notice', $notice);

				$this->redirect(array('sf_route' => 'worksheet_edit', 'sf_subject' => $worksheet));
			}
		} else {
			$this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
		}
	}


	protected function buildQuery()
	{
		$tableMethod = $this->configuration->getTableMethod();
		if (null === $this->filters) {
			$this->filters = $this->configuration->getFilterForm($this->getFilters());
		}

		$this->filters->setTableMethod($tableMethod);

		$query = $this->filters->buildQuery($this->getFilters());

		$this->addSortQuery($query);

		$event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
		$query = $event->getReturnValue();

		return $query;
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
		if($attachment)
		{
			$attachment->setTitle($request->getParameter('title'));
			$attachment->save();
		}

		return sfView::NONE;
	}

}
