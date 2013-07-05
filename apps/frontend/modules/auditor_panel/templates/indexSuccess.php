<?php use_helper('Status', 'Worksheet') ?>
<div class="">
	<h1>Добро пожаловать в систему</h1>
</div>
<div class="row">
<div class="info well span4">
	<h4>Ваши учетные данные</h4>
	<p><b>ФИО: </b><?php echo $sf_user->getFio() ?></p>
	<p><b>Вы: </b><?php echo $sf_user->getRusGroup() ?></p>
	<p><b>Ваш координатор: </b><?php echo $sf_user->getCoordinator() ?></p>
	<p><b>Контакты координатора: </b> <?php echo $sf_user->getCoordinatorContacts() ?></p>
</div>
</div>
<?php $filterValues = $sf_user->getRawValue()->getAttribute('auditor_panel.filter', array(), 'auditor_panel_module'); if (!empty($filterValues)): ?>
<div class="alert alert-info alert-block">
<a href="#" class="close fade" data-dismiss="alert">&times;</a>
<h4 class="alert-heading">Фильтр включен</h4>
Данные отфильтрованы. <a href="#filterPopup" data-toggle="modal">Управление фильтром</a>
</div>
<?php endif; ?>

<div class="pull-right">
<a href="#filterPopup" class="btn" data-toggle="modal"><i class="icon-search"></i> Поиск по разделу</a>
</div>

<div class="">
	<h2>Розничные торговые точки (РТТ)</h2>
	<?php include_partial('paginator', array('pager' => $pager)) ?>
	<table class="table table-bordered" style="margin-top: 15px;">
		<tr>
			<th>Дистрибьютор</th>
			<th>Юридическое название РТТ</th>
			<th>Название РТТ</th>
			<th>Адрес</th>
			<th>Регион</th>
			<th>Город</th>
			<th>Тип РТТ</th>
			<?php if($sf_user->hasCredential('coordinator') || $sf_user->hasCredential('project_manager') || $sf_user->hasCredential('client')): ?>
			<th>Статус аудита</th>
			<?php endif ?>
			<th>Анкета</th>
			<th>Фотографии</th>
			<th>Аудио</th>
			<?php if($sf_user->hasCredential('project_manager') || $sf_user->hasCredential('coordinator')): ?>
			<th>Кто заполнял</th>
			<?php endif ?>
			<?php if($sf_user->hasCredential('project_manager')): ?>
			<th>Кто координатор</th>
			<?php endif ?>

		</tr>
		<?php $outlets = $pager->getResults() ?>
		<?php if(count($outlets) > 0): ?>
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
			<?php if($sf_user->hasCredential('coordinator') || $sf_user->hasCredential('project_manager') || $sf_user->hasCredential('client')): ?>
			<th><?php echo worksheet_audit_status($outlet) ?></th>
			<?php endif ?>
			<td>
				<?php echo worksheet_button($outlet, $sf_user) ?>
			</td>
			<td>
				<?php echo worksheet_photo_button($outlet, $sf_user) ?>
			</td>
			<td>
				<?php echo worksheet_audio_button($outlet, $sf_user) ?>
			</td>
			<?php if($sf_user->hasCredential('project_manager') || $sf_user->hasCredential('coordinator')): ?>
			<td>
				<?php
					$auditor = get_worksheet_author($outlet);
					echo $auditor
				?>
				<?php if(!empty($auditor) && !sfConfig::get('app_static_mode')): ?>
				<a href="<?php echo url_for('auditor_panel_change_auditor', $outlet) ?>"><button class="btn">Сменить</button></a>
				<?php endif ?>
			</td>
			<?php endif ?>
			<?php if($sf_user->hasCredential('project_manager')): ?>
			<td><?php echo get_worksheet_authors_coordinator($outlet) ?></td>
			<?php endif ?>


			</td>
		</tr>
		<?php endforeach; ?>
		<?php endif; ?>
	</table>
	<?php include_partial('paginator', array('pager' => $pager)) ?>
</div>

<?php include_partial('auditor_panel/filters', array('form' => $filter)) ?>