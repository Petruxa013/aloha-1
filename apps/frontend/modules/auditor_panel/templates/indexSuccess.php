<?php use_helper('Status') ?>
<div class="">
	<h1>Добро пожаловать в систему</h1>
</div>
<div class="row">
<div class="info well span4">
	<h4>Ваши учетные данные</h4>
	<p><b>ФИО: </b><?php echo $sf_user->getFio() ?></p>
	<p><b>Вы: </b><?php echo $sf_user->getRusGroup() ?></p>
	<p><b>Ваш координатор: </b><?php echo $sf_user->getCoordinator() ?></p>
</div>
</div>
<div class="">
	<h2>Розничные торговые точки (РТТ)</h2>

	<table class="table table-bordered" style="margin-top: 15px;">
		<tr>
			<th>Дистрибьютор</th>
			<th>Юридическое название РТТ</th>
			<th>Название РТТ</th>
			<th>Адрес</th>
			<th>Регион</th>
			<th>Город</th>
			<th>Тип РТТ</th>
			<th>Анкета</th>
			<th>Фотографии</th>
			<th>Аудио</th>
			<th>Действия</th>
		</tr>
		<?php foreach($outlets as $key => $outlet): ?>
		<?php /* @var $outlet Outlet */ ?>
		<tr>
			<td><?php echo $outlet->getDistributor() ?></td>
			<td><?php echo $outlet->getLagalName() ?></td>
			<td><?php echo $outlet->getActualName() ?></td>
			<td><?php echo $outlet->getAddress() ?></td>
			<td><?php echo $outlet->getRegion() ?></td>
			<td><?php echo $outlet->getCity() ?></td>
			<td><?php echo $outlet->getHumanType() ?></td>
			<td>
				<?php echo worksheet_button($outlet) ?>
			</td>
			<td>
				<?php echo worksheet_photo_button($outlet) ?>
			</td>
			<td>
				<?php echo worksheet_audio_button($outlet) ?>
			</td>
			<td>
				<a href="<?php echo url_for('auditor_panel_worksheet_delete', $outlet)?>">
					<button class="btn btn-danger">Удалить</button>
				</a>
			</td>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>