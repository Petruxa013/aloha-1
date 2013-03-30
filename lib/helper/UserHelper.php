<?php
/**
 * Created by JetBrains PhpStorm.
 * User: astronom
 * Date: 30.03.13
 * Time: 22:56
 * To change this template use File | Settings | File Templates.
 */

class UserHelper
{
	public static $groupRus = array(
		'auditor'         => 'Аудитор',
		'coordinator'     => 'Координатор',
		'project_manager' => 'Руководитель проекта',
		'client'          => 'Клиент',
		'client_manager'  => 'Представитель клиента',
		'admin'           => 'Администратор'
	);

	public static function humanGroupName($group)
	{
		if(isset(self::$groupRus[$group]))
			return self::$groupRus[$group];
		return '';
	}

}

