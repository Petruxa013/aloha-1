<?php
/**
 * Created by JetBrains PhpStorm.
 * User: astronom
 * Date: 28.03.13
 * Time: 22:24
 * To change this template use File | Settings | File Templates.
 */

function worksheet_button($outlet, $user)
{
	$class = "btn-danger";
	$text = 'Заполнить анкету';
	/* @var $outlet Outlet */
	/* @var $worksheet Worksheet */
	$worksheet = $outlet->getWorksheet();
	if ($worksheet) {
		if($user->hasCredential('auditor') || $user->hasCredential('coordinator'))
		{
			if($worksheet->getStatus() == 10)
				$class = "btn-warning";
			if($worksheet->getStatus() >= 20)
				$class = "btn-success";

		}
		if($user->hasCredential('project_manager') || $user->hasCredential('client'))
		{
			if($worksheet->getStatus() == 10)
				$class = "btn-warning";
			if($worksheet->getStatus() == 20)
				$class = "btn-info";
			if($worksheet->getStatus() == 30)
				$class = "btn-success";
		}

		$text = 'Посмотреть анкету';
	}

	$button = '<a href="' . url_for('auditor_panel_add_worksheet', $outlet) . '">';
	$button .= '<button class="btn ' . $class . ' ">' . $text . '</button>';
	$button .= '</a>';

	return $button;

}

function worksheet_photo_button($outlet, $user, $old = false)
{
	$class = "btn-danger";
	$text = 'Загрузить фото';
	/* @var $outlet Outlet */
	if ($worksheet = $outlet->getWorksheet()) {
		if($user->hasCredential('auditor') || $user->hasCredential('coordinator'))
		{
			if($worksheet->getPhotoStatus() == 10)
				$class = "btn-warning";
			if($worksheet->getPhotoStatus() >= 20)
				$class = "btn-success";

		}
		if($user->hasCredential('project_manager') || $user->hasCredential('client'))
		{
			if($worksheet->getPhotoStatus() == 10)
				$class = "btn-warning";
			if($worksheet->getPhotoStatus() == 20)
				$class = "btn-info";
			if($worksheet->getPhotoStatus() == 30)
				$class = "btn-success";
		}

		$text = 'Посмотреть фото';
	}

	if($old)
		$route = 'auditor_panel_worksheet_additional_files';
	else
		$route = 'auditor_panel_worksheet_additional_m_files';

	$button = '<a href="' . url_for($route, $outlet) . '">';
	$button .= '<button class="btn ' . $class . ' ">' . $text . '</button>';
	$button .= '</a>';

	return $button;
}

function worksheet_audio_button($outlet, $user, $old = false)
{
	$class = "btn-danger";
	$text = 'Загрузить аудио';
	/* @var $outlet Outlet */
	if ($worksheet = $outlet->getWorksheet()) {
		if($user->hasCredential('auditor') || $user->hasCredential('coordinator'))
		{
			if($worksheet->getAudioStatus() == 10)
				$class = "btn-warning";
			if($worksheet->getAudioStatus() >= 20)
				$class = "btn-success";

		}
		if($user->hasCredential('project_manager') || $user->hasCredential('client'))
		{
			if($worksheet->getAudioStatus() == 10)
				$class = "btn-warning";
			if($worksheet->getAudioStatus() == 20)
				$class = "btn-info";
			if($worksheet->getAudioStatus() == 30)
				$class = "btn-success";
		}

		$text = 'Прослушать аудио';
	}

	if($old)
		$route = 'auditor_panel_worksheet_additional_files';
	else
		$route = 'auditor_panel_worksheet_additional_m_files';

	$button = '<a href="' . url_for($route, $outlet) . '">';
	$button .= '<button class="btn ' . $class . ' ">' . $text . '</button>';
	$button .= '</a>';

	return $button;
}

function worksheet_audit_status($outlet, $full_text = false)
{
	if($full_text)
		$audit_status = '<span title="Нет данных" class="label">Нет данных</span>';
	else
		$audit_status = '<span title="Нет данных" class="label">-</span>';

	/* @var $worksheet Worksheet */
	if ($worksheet = $outlet->getWorksheet()) {
		$status = $worksheet->getAuditStatus();
		if(is_null($status))
			return $audit_status;
		switch($status)
		{
			case 0:
				if($full_text)
					$audit_status = '<span title="Аудит не проведен" class="label label-important">Аудит не проведен</span>';
				else
					$audit_status = '<span title="Аудит не проведен" class="label label-important">Нет</span>';
				break;
			case 10:
				if($full_text)
					$audit_status = '<span title="Аудит проведен частично" class="label label-warning">Аудит проведен частично</span>';
				else
					$audit_status = '<span title="Аудит проведен частично" class="label label-warning">Част</span>';
				break;
			case 20:
				if($full_text)
					$audit_status = '<span title="Аудит проведен" class="label label-success">Аудит проведен</span>';
				else
					$audit_status = '<span title="Аудит проведен" class="label label-success">Да</span>';
				break;
		}
	}

	return $audit_status;
}

function worksheet_audit_simple_status($outlet, $full_text = false)
{
	if($full_text)
		$audit_status = 'Нет данных';
	else
		$audit_status = '-';

	/* @var $worksheet Worksheet */
	if ($worksheet = $outlet->getWorksheet()) {
		$status = $worksheet->getAuditStatus();
		if(is_null($status))
			return $audit_status;
		switch($status)
		{
			case 0:
				if($full_text)
					$audit_status = 'Аудит не проведен';
				else
					$audit_status = 'Нет';
				break;
			case 10:
				if($full_text)
					$audit_status = 'Аудит проведен частично';
				else
					$audit_status = 'Част';
				break;
			case 20:
				if($full_text)
					$audit_status = 'Аудит проведен';
				else
					$audit_status = 'Да';
				break;
		}
	}

	return $audit_status;
}

