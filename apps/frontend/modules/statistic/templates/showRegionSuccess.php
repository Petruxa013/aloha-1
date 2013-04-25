<div class="">
	<h2>Статистика по аудиту. Регион: <?php echo $region->getName() ?></h2>
	<div class="info well span4">
		<?php foreach($region->getCoordinators() as $coordinator): ?>
			<?php echo '<p>Координатор: '.$coordinator->getName().'</p>' ?>
			<?php echo '<p>Контакты: '.$coordinator->getContactComments().'</p>' ?>
		<?php endforeach ?>
	</div>
	<a href="<?php echo url_for('@statistic') ?>"><button class="btn btn-info">Вернуться к статистике по регионам</button> </a>
	<table class="table table-bordered table-striped" style="margin-top: 15px;">
		<tr>
			<th>Город</th>
			<th>Количество точек</th>
			<th>Готово</th>
			<th>Одобрено координатором</th>
			<th>Залито аудтором но не одобрено</th>
			<th>В работе</th>
			<th>Ничего нет</th>
		</tr>
		<?php
			$all_ = 0;
			$allDone_ = 0;
			$allCoordinator_ = 0;
			$allAuditor_ = 0;
			$noWorksheets_ = 0;
		?>

		<?php $regionCities = $region->getCities() ?>
		<?php foreach ($regionCities as $city): ?>

			<?php $cityOtletIds = array() ?>
			<?php $cityOtlets = OutletTable::getInstance()->findByRegionAndCity($region->getId(), $city->getId()) ?>
			<?php foreach ($cityOtlets as $cityOtlet): ?>
				<?php $cityOtletIds[] = $cityOtlet['id'] ?>
			<?php endforeach ?>

			<?php
			$all = OutletTable::getInstance()->countByRegionAndCity($region->getId(), $city->getId());
			if (!empty($cityOtletIds)) {
				$allDone = WorksheetTable::getInstance()->countDoneByOutlets($cityOtletIds);
				$allCoordinator = WorksheetTable::getInstance()->countCoordinatorDoneByOutlets($cityOtletIds);
				$allAuditor = WorksheetTable::getInstance()->countAuditorDoneByOutlets($cityOtletIds);
				$noWorksheets = WorksheetTable::getInstance()->countNotExistByOutlets($cityOtletIds);
			} else {
				$allDone = '-';
				$allCoordinator = '-';
				$allAuditor = '-';
				$noWorksheets = '-';
			}
			?>
			<tr>
				<td><?php echo $city->getName() ?></td>
				<td><?php echo $all ?></td>
				<td><?php echo $allDone ?></td>
				<td><?php echo $allCoordinator ?></td>
				<td><?php echo $allAuditor ?></td>

				<td><?php echo $all > 0 ? ($all - $allDone - $allCoordinator - $allAuditor - $noWorksheets) : '-' ?></td>
				<td><?php echo $noWorksheets ?></td>

			</tr>
			<?php
				$all_ += $all;
				$allDone_ += $allDone;
				$allCoordinator_ += $allCoordinator;
				$allAuditor_ += $allAuditor;
				$noWorksheets_ += $noWorksheets;

			?>

		<?php endforeach; ?>
			<tr>
				<td>Итого:</td>
				<td><?php echo $all_ ?></td>
				<td><?php echo $allDone_ ?></td>
				<td><?php echo $allCoordinator_ ?></td>
				<td><?php echo $allAuditor_ ?></td>
				<td><?php echo ($all_ - $allDone_ - $allCoordinator_ - $allAuditor_ - $noWorksheets_)?></td>
				<td><?php echo $noWorksheets_ ?></td>
			</tr>
	</table>