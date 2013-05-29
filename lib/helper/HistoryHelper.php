<?php
/**
 * Created by JetBrains PhpStorm.
 * User: astronom
 * Date: 26.04.13
 * Time: 14:59
 * To change this template use File | Settings | File Templates.
 */

function event_rus($history)
{
	/* @var $history History */
	$eventCode = History::$eventCode;

	if(array_key_exists($history->getEvent(), $eventCode))
		$action = $eventCode[$history->getEvent()];
	else
		$action = $history->getEvent();

	return $action;
}

function model_rus($history)
{
	/* @var $history History */
	$modelRus = History::$modelRus;

	if(array_key_exists($history->getModel(), $modelRus))
		$model = $modelRus[$history->getModel()];
	else
		$model = $history->getModel();

	return $model;

}

function model_rus_link($history)
{
	$modelRusLink = History::$modelRusLink;

	/* @var $history History */
	if(array_key_exists($history->getModel(), $modelRusLink))
	{
		$route = $modelRusLink[$history->getModel()]['route'][$history->getEvent()];
		$model = $history->getModel().'Table';
		$modelObject = $model::getInstance()->findOneById($history->getModelId());
		$object = call_user_func(array($modelObject, $modelRusLink[$history->getModel()]['object']));
		$modelLink = link_to(model_rus($history), $route, $object);
	}
	else
		$modelLink = model_rus($history);

	return $modelLink;

}