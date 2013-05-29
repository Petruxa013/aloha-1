<?php

/**
 * History filter form.
 *
 * @package    aloha
 * @subpackage filter
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class HistoryFormFilter extends BaseHistoryFormFilter
{
	public function configure()
	{
		$this->useFields(array(
			'event', 'user_id', 'created_at'
		));

		$eventChoices = array(0 => 'Все события') + History::$eventCode;

		$this->setWidget('event', new sfWidgetFormChoice(array('choices' => $eventChoices)), array());

		$this->setValidator('event', new sfValidatorChoice(array('choices' => array_keys($eventChoices)), array()));

	}

	protected function doBuildQuery(array $values)
	{
		/* @var $t Doctrine_Query */
		$query = parent::doBuildQuery($values);

		$eventId = isset($values['event']) ? $values['event'] : false;
		if ($eventId !== false && $eventId != 0)
			$query->addwhere(sprintf('%s.%s', $query->getRootAlias(), 'event').' = ?', $eventId);

		return $query;
	}
}
