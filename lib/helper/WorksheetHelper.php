<?php

function count_worksheet_sku_a($worksheet)
{
	$counter = 0;
	$items_a = array(
		'cordiant_comfort_155_65R13_a',
		'cordiant_comfort_175_70R13_a',
		'cordiant_comfort_175_65R14_a',
		'cordiant_comfort_185_60R14_a',
		'cordiant_comfort_185_65R14_a',
		'cordiant_comfort_185_70R14_a',
		'cordiant_comfort_185_65R15_a',
		'cordiant_comfort_195_65R15_a',
		'cordiant_comfort_205_60R15_a',
		'cordiant_comfort_205_65R15_a',
		'cordiant_comfort_205_55R16_a',
		'cordiant_comfort_205_60R16_a',
		'cordiant_comfort_215_55R16_a',
		'cordiant_sport_175_70R13_a',
		'cordiant_sport_175_65R14_a',
		'cordiant_sport_175_70R14_a',
		'cordiant_sport_185_60R14_a',
		'cordiant_sport_185_65R14_a',
		'cordiant_sport_185_70R14_a',
		'cordiant_sport_185_65R15_a',
		'cordiant_sport_195_60R15_a',
		'cordiant_sport_195_65R15_a',
		'cordiant_sport_205_60R15_a',
		'cordiant_sport_205_65R15_a',
		'cordiant_sport_205_55R16_a',
		'cordiant_sport_215_55R16_a',
		'cordiant_standart_175_70R13_a',
		'cordiant_standart_175_65R14_a',
		'cordiant_standart_175_70R14_a',
		'cordiant_standart_185_65R14_a',
		'cordiant_standart_185_70R14_a',
		'cordiant_standart_185_65R15_a',
		'cordiant_standart_195_65R15_a',
		'cordiant_all_terrain_225_70R16_a',
		'cordiant_all_terrain_215_65R16_a',
		'cordiant_all_terrain_215_70R16_a',
		'cordiant_all_terrain_205_70R15_a',
		'cordiant_sport_2_175_70R13_a',
		'cordiant_sport_2_175_65R14_a',
		'cordiant_sport_2_185_60R14_a',
		'cordiant_sport_2_185_65R14_a',
		'cordiant_sport_2_185_60R15_a',
		'cordiant_sport_2_195_55R15_a',
		'cordiant_sport_2_195_60R15_a',
		'cordiant_sport_2_195_65R15_a',
		'cordiant_sport_2_205_65R15_a',
		'cordiant_sport_2_205_55R16_a',
		'cordiant_sport_2_205_60R16_a',
		'cordiant_sport_2_215_55R16_a',
		'cordiant_sport_2_215_60R16_a',
		'cordiant_road_runner_155_70R13_a',
		'cordiant_road_runner_185_70R14_a',
		'cordiant_road_runner_205_60R16_a',
		'cordiant_road_runner_185_65R14_a',
		'cordiant_road_runner_195_65R15_a',
		'cordiant_road_runner_205_65R15_a',
		'cordiant_road_runner_205_55R16_a',
		'cordiant_road_runner_185_60R14_a',
		'cordiant_road_runner_175_70R13_a',
		'cordiant_road_runner_175_65R14_a',
		'cordiant_4_x_4_235_70R16_a',
		'cordiant_off_road_205_70R15_a',
		'cordiant_off_road_235_75R15_a',
		'cordiant_off_road_215_65R16_a',
		'cordiant_off_road_225_75R16_a',
		'cordiant_off_road_245_70R16_a',
		'tunga_ps_3_175_70R13_a',
		'tunga_camina_175_70R13_a',
		'tunga_camina_175_65R14_a',
		'tunga_camina_185_60R14_a',
		'tunga_camina_185_65R14_a',
		'tunga_camina_185_70R14_a',
		'tunga_camina_195_65R15_a',
	);
	if ($worksheet) {
		foreach ($items_a as $item_a) {
			$counter += (int)$worksheet->$item_a;
		}
	}
	return $counter;
}

function count_worksheet_sku_b($worksheet)
{
	$counter = 0;

	$items_b = array(
		'cordiant_comfort_155_65R13_b',
		'cordiant_comfort_175_70R13_b',
		'cordiant_comfort_175_65R14_b',
		'cordiant_comfort_185_60R14_b',
		'cordiant_comfort_185_65R14_b',
		'cordiant_comfort_185_70R14_b',
		'cordiant_comfort_185_65R15_b',
		'cordiant_comfort_195_65R15_b',
		'cordiant_comfort_205_60R15_b',
		'cordiant_comfort_205_65R15_b',
		'cordiant_comfort_205_55R16_b',
		'cordiant_comfort_205_60R16_b',
		'cordiant_comfort_215_55R16_b',
		'cordiant_sport_175_70R13_b',
		'cordiant_sport_175_65R14_b',
		'cordiant_sport_175_70R14_b',
		'cordiant_sport_185_60R14_b',
		'cordiant_sport_185_65R14_b',
		'cordiant_sport_185_70R14_b',
		'cordiant_sport_185_65R15_b',
		'cordiant_sport_195_60R15_b',
		'cordiant_sport_195_65R15_b',
		'cordiant_sport_205_60R15_b',
		'cordiant_sport_205_65R15_b',
		'cordiant_sport_205_55R16_b',
		'cordiant_sport_215_55R16_b',
		'cordiant_standart_175_70R13_b',
		'cordiant_standart_175_65R14_b',
		'cordiant_standart_175_70R14_b',
		'cordiant_standart_185_65R14_b',
		'cordiant_standart_185_70R14_b',
		'cordiant_standart_185_65R15_b',
		'cordiant_standart_195_65R15_b',
		'cordiant_all_terrain_225_70R16_b',
		'cordiant_all_terrain_215_65R16_b',
		'cordiant_all_terrain_215_70R16_b',
		'cordiant_all_terrain_205_70R15_b',
		'cordiant_sport_2_175_70R13_b',
		'cordiant_sport_2_175_65R14_b',
		'cordiant_sport_2_185_60R14_b',
		'cordiant_sport_2_185_65R14_b',
		'cordiant_sport_2_185_60R15_b',
		'cordiant_sport_2_195_55R15_b',
		'cordiant_sport_2_195_60R15_b',
		'cordiant_sport_2_195_65R15_b',
		'cordiant_sport_2_205_65R15_b',
		'cordiant_sport_2_205_55R16_b',
		'cordiant_sport_2_205_60R16_b',
		'cordiant_sport_2_215_55R16_b',
		'cordiant_sport_2_215_60R16_b',
		'cordiant_road_runner_155_70R13_b',
		'cordiant_road_runner_185_70R14_b',
		'cordiant_road_runner_205_60R16_b',
		'cordiant_road_runner_185_65R14_b',
		'cordiant_road_runner_195_65R15_b',
		'cordiant_road_runner_205_65R15_b',
		'cordiant_road_runner_205_55R16_b',
		'cordiant_road_runner_185_60R14_b',
		'cordiant_road_runner_175_70R13_b',
		'cordiant_road_runner_175_65R14_b',
		'cordiant_4_x_4_235_70R16_b',
		'cordiant_off_road_205_70R15_b',
		'cordiant_off_road_235_75R15_b',
		'cordiant_off_road_215_65R16_b',
		'cordiant_off_road_225_75R16_b',
		'cordiant_off_road_245_70R16_b',
		'tunga_ps_3_175_70R13_b',
		'tunga_camina_175_70R13_b',
		'tunga_camina_175_65R14_b',
		'tunga_camina_185_60R14_b',
		'tunga_camina_185_65R14_b',
		'tunga_camina_185_70R14_b',
		'tunga_camina_195_65R15_b'
	);

	if ($worksheet) {
		foreach ($items_b as $item_b) {
			$counter += (int)$worksheet->$item_b;
		}
	}
	return $counter;
}

function count_worksheet_sku_b_average_by_outlets($outlets)
{
	$counter = 0;
	$outletCounter = 0;

	$average = 0;

	$items_b = array(
		'cordiant_comfort_155_65R13_b',
		'cordiant_comfort_175_70R13_b',
		'cordiant_comfort_175_65R14_b',
		'cordiant_comfort_185_60R14_b',
		'cordiant_comfort_185_65R14_b',
		'cordiant_comfort_185_70R14_b',
		'cordiant_comfort_185_65R15_b',
		'cordiant_comfort_195_65R15_b',
		'cordiant_comfort_205_60R15_b',
		'cordiant_comfort_205_65R15_b',
		'cordiant_comfort_205_55R16_b',
		'cordiant_comfort_205_60R16_b',
		'cordiant_comfort_215_55R16_b',
		'cordiant_sport_175_70R13_b',
		'cordiant_sport_175_65R14_b',
		'cordiant_sport_175_70R14_b',
		'cordiant_sport_185_60R14_b',
		'cordiant_sport_185_65R14_b',
		'cordiant_sport_185_70R14_b',
		'cordiant_sport_185_65R15_b',
		'cordiant_sport_195_60R15_b',
		'cordiant_sport_195_65R15_b',
		'cordiant_sport_205_60R15_b',
		'cordiant_sport_205_65R15_b',
		'cordiant_sport_205_55R16_b',
		'cordiant_sport_215_55R16_b',
		'cordiant_standart_175_70R13_b',
		'cordiant_standart_175_65R14_b',
		'cordiant_standart_175_70R14_b',
		'cordiant_standart_185_65R14_b',
		'cordiant_standart_185_70R14_b',
		'cordiant_standart_185_65R15_b',
		'cordiant_standart_195_65R15_b',
		'cordiant_all_terrain_225_70R16_b',
		'cordiant_all_terrain_215_65R16_b',
		'cordiant_all_terrain_215_70R16_b',
		'cordiant_all_terrain_205_70R15_b',
		'cordiant_sport_2_175_70R13_b',
		'cordiant_sport_2_175_65R14_b',
		'cordiant_sport_2_185_60R14_b',
		'cordiant_sport_2_185_65R14_b',
		'cordiant_sport_2_185_60R15_b',
		'cordiant_sport_2_195_55R15_b',
		'cordiant_sport_2_195_60R15_b',
		'cordiant_sport_2_195_65R15_b',
		'cordiant_sport_2_205_65R15_b',
		'cordiant_sport_2_205_55R16_b',
		'cordiant_sport_2_205_60R16_b',
		'cordiant_sport_2_215_55R16_b',
		'cordiant_sport_2_215_60R16_b',
		'cordiant_road_runner_155_70R13_b',
		'cordiant_road_runner_185_70R14_b',
		'cordiant_road_runner_205_60R16_b',
		'cordiant_road_runner_185_65R14_b',
		'cordiant_road_runner_195_65R15_b',
		'cordiant_road_runner_205_65R15_b',
		'cordiant_road_runner_205_55R16_b',
		'cordiant_road_runner_185_60R14_b',
		'cordiant_road_runner_175_70R13_b',
		'cordiant_road_runner_175_65R14_b',
		'cordiant_4_x_4_235_70R16_b',
		'cordiant_off_road_205_70R15_b',
		'cordiant_off_road_235_75R15_b',
		'cordiant_off_road_215_65R16_b',
		'cordiant_off_road_225_75R16_b',
		'cordiant_off_road_245_70R16_b',
		'tunga_ps_3_175_70R13_b',
		'tunga_camina_175_70R13_b',
		'tunga_camina_175_65R14_b',
		'tunga_camina_185_60R14_b',
		'tunga_camina_185_65R14_b',
		'tunga_camina_185_70R14_b',
		'tunga_camina_195_65R15_b'
	);

	if ($outlets) {
		/* @var $outlet Outlet */
		foreach ($outlets as $outlet) {
			$worksheet = $outlet->getWorksheet();
			$outletCounter++;
			if ($worksheet) {
				foreach ($items_b as $item_b) {
					$counter += (int)$worksheet->$item_b;
				}

			}
		}
		if($outletCounter > 0)
			$average = round($counter/$outletCounter, 3);
	}
	return $average;
}

function get_worksheet_author($outlet)
{
	$author = '';

	/* @var $outlet Outlet */
	/* @var $worksheet Worksheet */
	$worksheet = $outlet->getWorksheet();
	if ($worksheet) {
		$authorId = $worksheet->getAuditorId();
		if ($authorId) {
			if ($user = sfGuardUserTable::getInstance()->findOneById($authorId))
				$author = $user->getName();
		}
	}
	return $author;
}

function get_worksheet_authors_coordinator($outlet)
{
	$coordinator = '';

	/* @var $outlet Outlet */
	/* @var $worksheet Worksheet */
	/* @var $user sfGuardUser */
	$worksheet = $outlet->getWorksheet();
	if ($worksheet) {
		$authorId = $worksheet->getAuditorId();
		if ($authorId) {
			if ($user = sfGuardUserTable::getInstance()->findOneById($authorId))
				$coordinator = $user->getMasters()[0];
				if($coordinator)
					$coordinator = $coordinator->getName();
		}
	}
	return $coordinator;
}