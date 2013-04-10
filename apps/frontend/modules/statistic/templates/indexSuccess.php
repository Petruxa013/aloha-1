<div class="">
	<h2>Статистика по аудиту</h2>
	<table class="table table-bordered" style="margin-top: 15px;">
	<?php foreach($regions as $region): ?>
		<h3>
			<?php echo $region->getName() ?>
<!--			--><?php //foreach($region->getUsers() as $coordinator): ?>
<!--				--><?php //echo 'Координатор: '.$coordinator->getName() ?>
<!--			--><?php //endforeach ?>
		</h3>
		<table class="table table-bordered" style="margin-top: 15px;">
			<tr>
				<th>Город</th>
				<th>Количество точек</th>
				<th>Готово</th>
				<th>Одобрено координатором</th>
				<th>Залито аудтором но не одобрено</th>
				<th>В работе</th>
				<th>Ничего нет</th>

			</tr>
			<?php $regionCities = $region->getCities() ?>
			<?php foreach($regionCities as $city): ?>

				<?php $cityOtletIds = array() ?>
				<?php $cityOtlets = OutletTable::getInstance()->findByRegionAndCity($region->getId(), $city->getId()) ?>
				<?php foreach($cityOtlets as $cityOtlet): ?>
					<?php $cityOtletIds[] = $cityOtlet['id'] ?>
				<?php endforeach ?>

				<?php

					$all = OutletTable::getInstance()->countByRegionAndCity($region->getId(), $city->getId());
					$allDone = WorksheetTable::getInstance()->countDoneByOutlets($cityOtletIds);
					$allCoordinator = WorksheetTable::getInstance()->countCoordinatorDoneByOutlets($cityOtletIds);
					$allAuditor = WorksheetTable::getInstance()->countAuditorDoneByOutlets($cityOtletIds);
					$allInWork = WorksheetTable::getInstance()->countOnWorkByOutlets($cityOtletIds)

					?>

				<tr>
					<td><?php echo $city->getName() ?></td>
					<td><?php echo $all ?></td>
					<td><?php echo $allDone ?></td>
					<td><?php echo $allCoordinator ?></td>
					<td><?php echo $allAuditor ?></td>

					<td><?php echo $allInWork ?></td>
					<td><?php echo ($all - $allDone - $allCoordinator - $allAuditor - $allInWork) ?></td>

				</tr>
			<?php endforeach; ?>
		</table>
	<?php endforeach ?>
