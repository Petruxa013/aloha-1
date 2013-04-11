<h2>Статистика по аудиту</h2>
<table class="table table-bordered" style="margin-top: 15px;">
	<tr>
		<th>Регион</th>
		<th>Всего</th>
		<th>Готово</th>
	</tr>
	<?php foreach ($regions as $region): ?>
		<?php
		$regionOtletIds = array();
		$regionOtlets = OutletTable::getInstance()->findByRegion($region->getId());
		foreach ($regionOtlets as $regionOtlet)
			$regionOtletIds[] = $regionOtlet['id'];

		if (!empty($regionOtletIds)) {
			$all = OutletTable::getInstance()->countByRegion($region->getId());
			$allDone = WorksheetTable::getInstance()->countDoneByOutlets($regionOtletIds);
		} else {
			$all = '-';
			$allDone = '-';
		}
		?>
		<tr>
			<td><?php echo link_to($region->getName(), 'statistic_show_region', $region) ?></td>
			<td><?php echo $all ?></td>
			<td><?php echo $allDone ?></td>
		</tr>
	<?php endforeach; ?>
</table>
