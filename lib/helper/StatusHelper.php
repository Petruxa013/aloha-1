<?php
/**
 * Created by JetBrains PhpStorm.
 * User: astronom
 * Date: 28.03.13
 * Time: 22:24
 * To change this template use File | Settings | File Templates.
 */

function worksheet_button($outlet)
{
	$class = "btn-danger";
	$text = 'Заполнить анкету';
	/* @var $outlet Outlet */
	/* @var $worksheet Worksheet */
	$worksheet = $outlet->getWorksheet();
	if ($worksheet) {
		if($worksheet->getStatus() == 10)
			$class = "btn-warning";
		if($worksheet->getStatus() == 20)
			$class = "btn-success";

		$text = 'Посмотреть анкету';
	}

	$button = '<a href="' . url_for('auditor_panel_add_worksheet', $outlet) . '">';
	$button .= '<button class="btn ' . $class . ' ">' . $text . '</button>';
	$button .= '</a>';

	return $button;

}

function worksheet_photo_button($outlet)
{
	$class = "btn-danger";
	$text = 'Загрузить фото';
	/* @var $outlet Outlet */
	if ($worksheet = $outlet->getWorksheet()) {
		if($worksheet->hasImages())
			{
				$class = "btn-warning";
				$text = 'Посмотреть фото';
			}
	}

	$button = '<a href="' . url_for('auditor_panel_worksheet_additional_files', $outlet) . '">';
	$button .= '<button class="btn ' . $class . ' ">' . $text . '</button>';
	$button .= '</a>';

	return $button;
}

function worksheet_audio_button($outlet)
{
	$class = "btn-danger";
	$text = 'Загрузить аудио';
	/* @var $outlet Outlet */
	if ($worksheet = $outlet->getWorksheet()) {
		if($worksheet->hasAudios())
			{
				$class = "btn-warning";
				$text = 'Прослушать аудио';
			}
	}

	$button = '<a href="' . url_for('auditor_panel_worksheet_additional_files', $outlet) . '">';
	$button .= '<button class="btn ' . $class . ' ">' . $text . '</button>';
	$button .= '</a>';

	return $button;
}

