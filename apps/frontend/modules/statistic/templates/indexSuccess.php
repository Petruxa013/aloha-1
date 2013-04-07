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
				<th>Частично или незаполненные аудитором</th>

			</tr>
			<?php $regionCities = $region->getCities() ?>
			<?php foreach($regionCities as $city): ?>
				<?php $cityOtletIds = array() ?>
				<?php $cityOtlets = OutletTable::getInstance()->findByRegionAndCity($region->getId(), $city->getId()) ?>
					<?php foreach($cityOtlets as $cityOtlet): ?>
						<?php $cityOtletIds[] = $cityOtlet['id'] ?>
					<?php endforeach ?>

				<tr>
					<td><?php echo $city->getName() ?></td>
					<td><?php echo OutletTable::getInstance()->countByRegionAndCity($region->getId(), $city->getId()) ?></td>
					<td><?php echo WorksheetTable::getInstance()->countDoneByOutlets($cityOtletIds) ?></td>
					<td><?php
						$coordinatorDone = WorksheetTable::getInstance()->countCoordinatorDoneByOutlets($cityOtletIds);
						echo $coordinatorDone;
						?></td>
					<td><?php echo WorksheetTable::getInstance()->countAuditorDoneByOutlets($cityOtletIds) ?></td>
					<td><?php echo WorksheetTable::getInstance()->countAuditorNotDoneByOutlets($cityOtletIds) ?></td>

				</tr>
			<?php endforeach; ?>
		</table>
	<?php endforeach ?>
