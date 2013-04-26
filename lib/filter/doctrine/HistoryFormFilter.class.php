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

		$this->setWidget('event', new sfWidgetFormChoice(array('choices' => History::$eventCode)), array());

		$this->setValidator('event', new sfValidatorChoice(array('choices' => array_keys(History::$eventCode)), array()));

	}

	protected function doBuildQuery(array $values)
	{
		/* @var $t Doctrine_Query */
		$query = parent::doBuildQuery($values);

		$eventId = isset($values['event']) ? $values['event'] : false;
		if ($eventId)
			$query->addwhere(sprintf('%s.%s', $query->getRootAlias(), 'event').' =?', $eventId);

		return $query;
	}
}
