<?php use_helper('Date') ?>
<style>
	input[type=checkbox]
	{
	  /* Double-sized Checkboxes */
	  -ms-transform: scale(1.4); /* IE */
	  -moz-transform: scale(1.4); /* FF */
	  -webkit-transform: scale(1.4); /* Safari and Chrome */
	  -o-transform: scale(1.4); /* Opera */
	  padding: 6px;
	}
</style>
<h1>БЛАНК АУДИТА ПРОДУКЦИИ CORDIANT и TUNGA</h1>
<?php if($form->hasErrors()): ?>
<div class="alert">
	Не все поля формы заполнены верно
</div>
<?php endif ?>
<?php if($worksheet->getId() && $worksheet->getStatus() === null): ?>
<div class="alert alert-danger container">
	<div class="row container">
		Анкета была возвращена на доработку.
	</div>
<?php foreach($historyDissaprove as $history): ?>
	<div class="row container">
		<?php echo format_datetime($history->getCreatedAt()).' <b>Причина: '.$history->getComment().'</b>' ?>
	</div>
<?php endforeach; ?>
</div>
<?php endif ?>
<?php if(!sfConfig::get('app_static_mode')): ?>
<form action="<?php echo url_for('auditor_panel_add_worksheet', $outlet) ?>" method="post">
<?php endif; ?>
<table class="table table-bordered table-striped">
	<tr>
		<td>
			Юридическое название РТТ
		</td>
		<td><?php
			/* @var $outlet Outlet */
			echo $outlet->getLagalName() ?></td>
	</tr>
	<tr>
		<td>Фактическое название РТТ (вывеска)</td>
		<td><?php echo $outlet->getActualName() ?></td>
	</tr>
	<tr>
		<td>Фактический адрес (город, улица, дом)</td>
		<td><?php echo $outlet->getAddress() ?></td>
	</tr>
	<tr>
		<td>Сотрудник РТТ ФИО</td>
		<td><?php echo $form['outlet_manager']->render() ?></td>
	</tr>
	<tr>
		<td>Должность сотрудника РТТ</td>
		<td><?php echo $form['outlet_manager_position']->render() ?></td>
	</tr>
	<tr>
		<td>Контактный телефон РТТ</td>
		<td><?php echo $form['outlet_phone']->render() ?></td>
	</tr>
</table>
<table class="table">
<tr>
<td>
<table class="table table-bordered table-striped">
<tr>
	<th>Название бренда</th>
	<th>Типоразмер</th>
	<th>Наличие SKU в торговой точке
		(в торговом зале или на складе),
	</th>
	<th>Наличие минимального кол-ва = 4 шт (торговый зал + склад)</th>
</tr>
<tr>
	<td rowspan="13">CORDIANT COMFORT</td>
	<td>155/65R13</td>
	<td><?php echo $form['cordiant_comfort_155_65R13_a']->render() ?></td>
	<td><?php echo $form['cordiant_comfort_155_65R13_b']->render() ?></td>
</tr>
<tr>
	<td>175/70R13</td>
	<td><?php echo $form['cordiant_comfort_175_70R13_a']->render() ?></td>
	<td><?php echo $form['cordiant_comfort_175_70R13_b']->render() ?></td>
</tr>
<tr>
	<td>175/65R14
	</td>
	<td><?php echo $form['cordiant_comfort_175_65R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_comfort_175_65R14_b']->render() ?></td>
</tr>
<tr>
	<td>185/60R14
	</td>
	<td><?php echo $form['cordiant_comfort_185_60R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_comfort_185_60R14_b']->render() ?></td>
</tr>
<tr>
	<td>185/65R14
	</td>
	<td><?php echo $form['cordiant_comfort_185_65R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_comfort_185_65R14_b']->render() ?></td>
</tr>
<tr>
	<td>185/70R14
	</td>
	<td><?php echo $form['cordiant_comfort_185_70R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_comfort_185_70R14_b']->render() ?></td>
</tr>
<tr>

	<td>185/65R15
	</td>
	<td><?php echo $form['cordiant_comfort_185_65R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_comfort_185_65R15_b']->render() ?></td>
</tr>
<tr>

	<td>195/65R15
	</td>
	<td><?php echo $form['cordiant_comfort_195_65R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_comfort_195_65R15_b']->render() ?></td>
</tr>
<tr>

	<td>205/60R15</td>
	<td><?php echo $form['cordiant_comfort_205_60R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_comfort_205_60R15_b']->render() ?></td>
</tr>
<tr>

	<td>205/65R15
	</td>
	<td><?php echo $form['cordiant_comfort_205_65R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_comfort_205_65R15_b']->render() ?></td>
</tr>
<tr>

	<td>205/55R16
	</td>
	<td><?php echo $form['cordiant_comfort_205_55R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_comfort_205_55R16_b']->render() ?></td>
</tr>
<tr>

	<td>205/60R16
	</td>
	<td><?php echo $form['cordiant_comfort_205_60R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_comfort_205_60R16_b']->render() ?></td>
</tr>
<tr>

	<td>215/55R16</td>
	<td><?php echo $form['cordiant_comfort_215_55R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_comfort_215_55R16_b']->render() ?></td>
</tr>
<tr><td colspan="4" style="height: 20px;"></td></tr>
<tr>
	<td rowspan="13">CORDIANT SPORT</td>
	<td>175/70R13
	</td>
	<td><?php echo $form['cordiant_sport_175_70R13_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_175_70R13_b']->render() ?></td>
</tr>
<tr>
	<td>175/65R14
	</td>
	<td><?php echo $form['cordiant_sport_175_65R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_175_65R14_b']->render() ?></td>
</tr>
<tr>
	<td>175/70R14
	</td>
	<td><?php echo $form['cordiant_sport_175_70R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_175_70R14_b']->render() ?></td>
</tr>
<tr>
	<td>185/60R14
	</td>
	<td><?php echo $form['cordiant_sport_185_60R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_185_60R14_b']->render() ?></td>
</tr>
<tr>
	<td>185/65R14

	</td>
	<td><?php echo $form['cordiant_sport_185_65R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_185_65R14_b']->render() ?></td>
</tr>
<tr>
	<td>185/70R14
	</td>
	<td><?php echo $form['cordiant_sport_185_70R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_185_70R14_b']->render() ?></td>
</tr>
<tr>
	<td>185/65R15
	</td>
	<td><?php echo $form['cordiant_sport_185_65R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_185_65R15_b']->render() ?></td>
</tr>
<tr>
	<td>195/60R15
	</td>
	<td><?php echo $form['cordiant_sport_195_60R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_195_60R15_b']->render() ?></td>
</tr>
<tr>
	<td>195/65R15
	</td>
	<td><?php echo $form['cordiant_sport_195_65R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_195_65R15_b']->render() ?></td>
</tr>
<tr>
	<td>205/60R15
	</td>
	<td><?php echo $form['cordiant_sport_205_60R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_205_60R15_b']->render() ?></td>
</tr>
<tr>
	<td>205/65R15

	</td>
	<td><?php echo $form['cordiant_sport_205_65R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_205_65R15_b']->render() ?></td>
</tr>
<tr>
	<td>205/55R16
	</td>
	<td><?php echo $form['cordiant_sport_205_55R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_205_55R16_b']->render() ?></td>
</tr>
<tr>
	<td>215/55R16</td>
	<td><?php echo $form['cordiant_sport_215_55R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_215_55R16_b']->render() ?></td>
</tr>
<tr><td colspan="4" style="height: 20px;"></td></tr>
<tr>
	<td rowspan="7">CORDIANT STANDART</td>
	<td>175/70R13
	</td>
	<td><?php echo $form['cordiant_standart_175_70R13_a']->render() ?></td>
	<td><?php echo $form['cordiant_standart_175_70R13_b']->render() ?></td>
</tr>
<tr>
	<td>175/65R14
	</td>
	<td><?php echo $form['cordiant_standart_175_65R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_standart_175_65R14_b']->render() ?></td>
</tr>
<tr>
	<td>175/70R14
	</td>
	<td><?php echo $form['cordiant_standart_175_70R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_standart_175_70R14_b']->render() ?></td>
</tr>
<tr>
	<td>185/65R14
	</td>
	<td><?php echo $form['cordiant_standart_185_65R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_standart_185_65R14_b']->render() ?></td>
</tr>
<tr>
	<td>185/70R14
	</td>
	<td><?php echo $form['cordiant_standart_185_70R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_standart_185_70R14_b']->render() ?></td>
</tr>
<tr>
	<td>185/65R15
	</td>
	<td><?php echo $form['cordiant_standart_185_65R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_standart_185_65R15_b']->render() ?></td>
</tr>
<tr>
	<td>195/65R15</td>
	<td><?php echo $form['cordiant_standart_195_65R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_standart_195_65R15_b']->render() ?></td>
</tr>
<tr><td colspan="4" style="height: 20px;"></td></tr>
<tr>
	<td rowspan="4">CORDIANT ALL TERRAIN</td>
	<td>225/70R16
	</td>
	<td><?php echo $form['cordiant_all_terrain_225_70R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_all_terrain_225_70R16_b']->render() ?></td>
</tr>
<tr>
	<td>215/65R16
	</td>
	<td><?php echo $form['cordiant_all_terrain_215_65R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_all_terrain_215_65R16_b']->render() ?></td>
</tr>
<tr>
	<td>215/70R16
	</td>
	<td><?php echo $form['cordiant_all_terrain_215_70R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_all_terrain_215_70R16_b']->render() ?></td>
</tr>
<tr>
	<td>205/70R15</td>
	<td><?php echo $form['cordiant_all_terrain_205_70R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_all_terrain_205_70R15_b']->render() ?></td>
</tr>
</table>
</td>
<td>
<table class="table table-bordered table-striped">
<tr>
	<th>Название бренда</th>
	<th>Типоразмер</th>
	<th>Наличие SKU в торговой точке
		(в торговом зале или на складе),
	</th>
	<th>Наличие минимального кол-ва = 4 шт (торговый зал + склад)</th>
</tr>
<tr>
	<td rowspan="13">CORDIANT SPORT 2</td>
	<td>175/70R13
	</td>
	<td><?php echo $form['cordiant_sport_2_175_70R13_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_2_175_70R13_b']->render() ?></td>
</tr>
<tr>
	<td>175/65R14
	</td>
	<td><?php echo $form['cordiant_sport_2_175_65R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_2_175_65R14_b']->render() ?></td>
</tr>
<tr>
	<td>185/60R14
	</td>
	<td><?php echo $form['cordiant_sport_2_185_60R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_2_185_60R14_b']->render() ?></td>
</tr>
<tr>
	<td>185/65R14
	</td>
	<td><?php echo $form['cordiant_sport_2_185_65R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_2_185_65R14_b']->render() ?></td>
</tr>
<tr>
	<td>185/60R15
	</td>
	<td><?php echo $form['cordiant_sport_2_185_60R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_2_185_60R15_b']->render() ?></td>
</tr>
<tr>
	<td>195/55R15
	</td>
	<td><?php echo $form['cordiant_sport_2_195_55R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_2_195_55R15_b']->render() ?></td>
</tr>
<tr>
	<td>195/60R15
	</td>
	<td><?php echo $form['cordiant_sport_2_195_60R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_2_195_60R15_b']->render() ?></td>
</tr>
<tr>
	<td>195/65R15

	</td>
	<td><?php echo $form['cordiant_sport_2_195_65R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_2_195_65R15_b']->render() ?></td>
</tr>
<tr>
	<td>205/65R15
	</td>
	<td><?php echo $form['cordiant_sport_2_205_65R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_2_205_65R15_b']->render() ?></td>
</tr>
<tr>
	<td>205/55R16
	</td>
	<td><?php echo $form['cordiant_sport_2_205_55R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_2_205_55R16_b']->render() ?></td>
</tr>
<tr>
	<td>205/60R16
	</td>
	<td><?php echo $form['cordiant_sport_2_205_60R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_2_205_60R16_b']->render() ?></td>
</tr>
<tr>
	<td>215/55R16
	</td>
	<td><?php echo $form['cordiant_sport_2_215_55R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_2_215_55R16_b']->render() ?></td>
</tr>
<tr>
	<td>215/60R16</td>
	<td><?php echo $form['cordiant_sport_2_215_60R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_sport_2_215_60R16_b']->render() ?></td>
</tr>
<tr><td colspan="4" style="height: 20px;"></td></tr>
<tr>
	<td rowspan="10">CORDIANT ROAD RUNNER</td>
	<td>155/70R13
	</td>
	<td><?php echo $form['cordiant_road_runner_155_70R13_a']->render() ?></td>
	<td><?php echo $form['cordiant_road_runner_155_70R13_b']->render() ?></td>
</tr>
<tr>
	<td>185/70R14
	</td>
	<td><?php echo $form['cordiant_road_runner_185_70R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_road_runner_185_70R14_b']->render() ?></td>
</tr>
<tr>
	<td>205/60R16
	</td>
	<td><?php echo $form['cordiant_road_runner_205_60R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_road_runner_205_60R16_b']->render() ?></td>
</tr>
<tr>
	<td>185/65R14
	</td>
	<td><?php echo $form['cordiant_road_runner_185_65R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_road_runner_185_65R14_b']->render() ?></td>
</tr>
<tr>
	<td>195/65R15
	</td>
	<td><?php echo $form['cordiant_road_runner_195_65R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_road_runner_195_65R15_b']->render() ?></td>
</tr>
<tr>
	<td>205/65R15
	</td>
	<td><?php echo $form['cordiant_road_runner_205_65R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_road_runner_205_65R15_b']->render() ?></td>
</tr>
<tr>
	<td>205/55R16
	</td>
	<td><?php echo $form['cordiant_road_runner_205_55R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_road_runner_205_55R16_b']->render() ?></td>
</tr>
<tr>
	<td>185/60R14
	</td>
	<td><?php echo $form['cordiant_road_runner_185_60R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_road_runner_185_60R14_b']->render() ?></td>
</tr>
<tr>
	<td>175/70R13
	</td>
	<td><?php echo $form['cordiant_road_runner_175_70R13_a']->render() ?></td>
	<td><?php echo $form['cordiant_road_runner_175_70R13_b']->render() ?></td>
</tr>
<tr>
	<td>175/65R14</td>
	<td><?php echo $form['cordiant_road_runner_175_65R14_a']->render() ?></td>
	<td><?php echo $form['cordiant_road_runner_175_65R14_b']->render() ?></td>
</tr>
<tr><td colspan="4" style="height: 20px;"></td></tr>
<tr>
	<td>CORDIANT 4х4</td>
	<td>235/70R16</td>
	<td><?php echo $form['cordiant_4_x_4_235_70R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_4_x_4_235_70R16_b']->render() ?></td>
</tr>
<tr><td colspan="4" style="height: 20px;"></td></tr>
<tr>
	<td rowspan="5">CORDIANT OFF ROAD</td>
	<td>205/70R15
	</td>
	<td><?php echo $form['cordiant_off_road_205_70R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_off_road_205_70R15_b']->render() ?></td>
</tr>
<tr>
	<td>235/75R15
	</td>
	<td><?php echo $form['cordiant_off_road_235_75R15_a']->render() ?></td>
	<td><?php echo $form['cordiant_off_road_235_75R15_b']->render() ?></td>
</tr>
<tr>
	<td>215/65R16
	</td>
	<td><?php echo $form['cordiant_off_road_215_65R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_off_road_215_65R16_b']->render() ?></td>
</tr>
<tr>
	<td>225/75R16
	</td>
	<td><?php echo $form['cordiant_off_road_225_75R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_off_road_225_75R16_b']->render() ?></td>
</tr>
<tr>
	<td>245/70R16</td>
	<td><?php echo $form['cordiant_off_road_245_70R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_off_road_245_70R16_b']->render() ?></td>
</tr>
<tr><td colspan="4" style="height: 20px;"></td></tr>
<tr>
	<td>TUNGA PS-3</td>
	<td>175/70R13</td>
	<td><?php echo $form['tunga_ps_3_175_70R13_a']->render() ?></td>
	<td><?php echo $form['tunga_ps_3_175_70R13_b']->render() ?></td>
</tr>
<tr><td colspan="4" style="height: 20px;"></td></tr>
<tr>
	<td rowspan="6">TUNGA CAMINA</td>
	<td>175/70R13
	</td>
	<td><?php echo $form['tunga_camina_175_70R13_a']->render() ?></td>
	<td><?php echo $form['tunga_camina_175_70R13_b']->render() ?></td>
</tr>
<tr>
	<td>175/65R14
	</td>
	<td><?php echo $form['tunga_camina_175_65R14_a']->render() ?></td>
	<td><?php echo $form['tunga_camina_175_65R14_b']->render() ?></td>
</tr>
<tr>
	<td>185/60R14
	</td>
	<td><?php echo $form['tunga_camina_185_60R14_a']->render() ?></td>
	<td><?php echo $form['tunga_camina_185_60R14_b']->render() ?></td>
</tr>
<tr>
	<td>185/65R14
	</td>
	<td><?php echo $form['tunga_camina_185_65R14_a']->render() ?></td>
	<td><?php echo $form['tunga_camina_185_65R14_b']->render() ?></td>
</tr>
<tr>
	<td> 185/70R14
	</td>
	<td><?php echo $form['tunga_camina_185_70R14_a']->render() ?></td>
	<td><?php echo $form['tunga_camina_185_70R14_b']->render() ?></td>
</tr>
<tr>
	<td> 195/65R15</td>
	<td><?php echo $form['tunga_camina_195_65R15_a']->render() ?></td>
	<td><?php echo $form['tunga_camina_195_65R15_b']->render() ?></td>
</tr>

</table>

</td>
</tr>
</table>
<div class="alert alert-info">
	Поля, отмеченные * обязательны для заполнения
</div>
<table class="table table-bordered table-striped">
	<tr>
		<td>Как были получены данные по остаткам шин *</td>
		<td>
			<?php echo $form['comment_data']->render() ?>
			<?php echo $form['comment_data']->renderError() ?>
			<img src="/images/worksheet_comments.jpg">
		</td>
	</tr>
	<tr>
		<td>Комментарии</td>
		<td>
			<?php echo $form['comment']->render() ?>
			<?php echo $form['comment']->renderError() ?>
			<p>
				<b>Название РТТ</b><br>
				Юридическое <br>
					- не изменилось <br>
					- изменилось   (написать какое стало) <br>
				Фактическое <br>
					- не изменилось <br>
					- изменилось (написать, какое стало) <br>

				<b>Адрес РТТ </b> <br>
					- не изменился <br>
					- изменился (написать, какой стал) <br>
					- торговая точка не существует <br>
						- РТТ закрыта <br>
						- здание не существует <br>
			</p>
		</td>
	</tr>
	<tr>
		<td>Статус аудита *</td>
		<td>
			<?php echo $form['audit_status']->render() ?>
			<?php echo $form['audit_status']->renderError() ?>
			<p>
				<b>Внимательно выбирайте статус аудита!!!</b>
				Статус аудита зависит только от наличия или отсутствия у нас данных по представленности шин в точке. <br />
				Если у вас есть данные по обоим столбцам - аудит проведен. <br />
				Если данные есть только по первому столбцу и вам не дали данные склада и туда не пустили - аудит проведен частично. <br />
				Если вам не дали данные по остаткам вообще (не дали посмотреть зал и не дали складские остатки) - аудит не проведен. <br />
				Если точка закрыта или отсутствует - аудит не проведен. <br />
				<b>Если точка НЕ продает шины Кордиант - аудит проведен.</b>
			</p>
		</td>
	</tr>
	<tr>
		<td>Дата визита *</td>
		<td>
			<?php echo $form['date']->render() ?>
			<?php echo $form['date']->renderError() ?>
		</td>
	</tr>
	<tr>
		<td>Время визита *</td>
		<td>
			<?php echo $form['time']->render() ?>
			<?php echo $form['time']->renderError() ?>
		</td>
	</tr>
</table>
<div class="pagination-centered">

	<?php if($sf_user->hasCredential('auditor') && !sfConfig::get('app_static_mode')): ?>
	<!-- Аудитор -->
		<?php if($worksheet->getStatus() < 20): ?>
		<button type="submit" class="btn">
			<?php if($worksheet->getStatus() >= 10): ?>
				Обновить анкету
			<?php else: ?>
				Сохранить
			<?php endif; ?>
		</button>
		<?php else: ?>
			<div class="alert alert-info">
				Анкета одобрена, редактирование невозможно
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php if($sf_user->hasCredential('coordinator') && !sfConfig::get('app_static_mode')): ?>
	<!-- Координатор -->
		<?php if($worksheet->getStatus() < 30): ?>
		<button type="submit" class="btn">
			<?php if($worksheet->getStatus() >= 10): ?>
				Обновить анкету и одобрить
			<?php else: ?>
				Сохранить и одобрить
			<?php endif; ?>
		</button>
		<?php else: ?>
			<div class="alert alert-info">
				Анкета одобрена, редактирование невозможно
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php if($sf_user->hasCredential('project_manager') && !sfConfig::get('app_static_mode')): ?>
		<!-- Руководитель -->
	<button type="submit" class="btn">
		<?php if($worksheet->getStatus() >= 10): ?>
			Обновить анкету и одобрить
		<?php else: ?>
			Сохранить и одобрить
		<?php endif; ?>
	</button>
	<?php endif; ?>

	<?php if($sf_user->hasCredential('coordinator') && !sfConfig::get('app_static_mode')): ?>
	<?php if($worksheet->getStatus() <= 10): ?>
	<a class="action" href="<?php echo url_for('auditor_panel_approve_worksheet', $outlet) ?>">
		<button type="button" class="btn btn-info">Одобрить анкету</button>
	</a>
	<a href="#disaprovePopup" class="btn btn-danger" data-toggle="modal">Вернуть анкету на доработку</a>
	<?php elseif($worksheet->getStatus() == 20): ?>
		<a href="#disaprovePopup" class="btn btn-danger" data-toggle="modal">Вернуть анкету на доработку</a>
	<?php endif; ?>
	<?php endif; ?>

	<?php if($sf_user->hasCredential('project_manager') && !sfConfig::get('app_static_mode')): ?>
	<?php if($worksheet->getStatus() <= 20): ?>
	<a class="action" href="<?php echo url_for('auditor_panel_approve_worksheet', $outlet) ?>">
		<button type="button" class="btn btn-success">Одобрить анкету</button>
	</a>
	<a href="#disaprovePopup" class="btn btn-danger" data-toggle="modal">Вернуть анкету на доработку</a>
	<?php elseif($worksheet->getStatus() == 30): ?>
		<a href="#disaprovePopup" class="btn btn-danger" data-toggle="modal">Вернуть анкету на доработку</a>
		<div class="alert alert-info">
			Анкета одобрена, ее видит клиент
		</div>
	<?php endif; ?>
	<?php endif; ?>

</div>
</form>
<?php if(($sf_user->hasCredential('project_manager') || $sf_user->hasCredential('coordinator')) && !sfConfig::get('app_static_mode')): ?>
<div id="disaprovePopup" class="modal hide fade">

	<form action="<?php echo url_for('auditor_panel_disapprove_worksheet', $outlet) ?>" method="post"  class="form-horizontal">

		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>

			<h3>Вернуть анкету на доработку</h3>
		</div>

		<div class="modal-body">
			<label>Комментраий к действию</label>
			<textarea cols="10" rows="3" name="comment" style="width: 97%"></textarea>
		</div>

		<div class="modal-footer">
			<button type="submit" class="btn btn-danger">Вернуть анкету на доработку</button>
			<button type="reset" class="btn">Отмена</button>
		</div>

	</form>

</div>
<?php endif; ?>
<script type="text/javascript">
	$(function () {
		$('input:checkbox[name$="_b]"]').click(function() {
			if($(this).is(':checked'))
				$(this).parent('td').parent('tr').find('input:checkbox[name$="_a]"]').attr('checked', true);
		});
		$('input:checkbox[name$="_a]"]').click(function() {
			if($(this).parent('td').parent('tr').find('input:checkbox[name$="_b]"]').is(':checked'))
				$(this).attr('checked', true);
		});
		$('a.action').click(function() {
			$.post($(this).attr('href'), function(data) {
				window.location = data.url;
			});
			return false;
		});
	});
</script>
