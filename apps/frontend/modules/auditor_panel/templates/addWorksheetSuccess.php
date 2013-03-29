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
<form action="<?php echo url_for('auditor_panel_add_worksheet', $outlet) ?>" method="post">
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

<tr>
	<td>CORDIANT 4х4</td>
	<td>235/70R16</td>
	<td><?php echo $form['cordiant_4_x_4_235_70R16_a']->render() ?></td>
	<td><?php echo $form['cordiant_4_x_4_235_70R16_b']->render() ?></td>
</tr>

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

<tr>
	<td>TUNGA PS-3</td>
	<td>175/70R13</td>
	<td><?php echo $form['tunga_ps_3_175_70R13_a']->render() ?></td>
	<td><?php echo $form['tunga_ps_3_175_70R13_b']->render() ?></td>
</tr>

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
<table class="table table-bordered table-striped">
	<tr>
		<td>Комментарии</td>
		<td><?php echo $form['comment']->render() ?></td>
	</tr>
	<tr>
		<td>Дата визита</td>
		<td><?php echo $form['date']->render() ?></td>
	</tr>
	<tr>
		<td>Время визита</td>
		<td><?php echo $form['time']->render() ?></td>
	</tr>
</table>
<div class="pagination-centered">
	<button type="submit" class="btn btn-info">Сохранить</button>
</div>
</form>
<script type="text/javascript">
	$(function () {
		$('input:checkbox[name$="_b]"]').click(function() {
			if($(this).is(':checked'))
				$(this).parent('td').parent('tr').find('input:checkbox[name$="_a]"]').attr('checked', true);
		});
	});
</script>
