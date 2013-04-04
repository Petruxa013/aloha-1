<?php use_helper('Worksheet') ?>
<div class="">
	<h1>Добро пожаловать в систему</h1>
</div>
<div class="row">
<div class="info well span4">
	<h4>Ваши учетные данные</h4>
	<p><b>ФИО: </b><?php echo $sf_user->getFio() ?></p>
	<p><b>Вы: </b><?php echo $sf_user->getRusGroup() ?></p>
</div>
</div>
<?php $filterValues = $sf_user->getRawValue()->getAttribute('client_panel.filter', array(), 'client_panel_module'); if (!empty($filterValues)): ?>
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
			<th>Наличие SKU в торговой точке
					(в торговом зале или на складе),</th>
			<th>Наличие минимального кол-ва = 4 шт (торговый зал + склад)</th>
			<th>Результат</th>
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
			<td>
				<a href="<?php echo url_for('auditor_panel_add_worksheet', $outlet) ?>" title="Перейти к отчету по точке"><span class="badge badge-info"><?php echo count_worksheet_sku_a($outlet->getWorksheet()); ?></span></a>
			</td>
			<td>
				<a href="<?php echo url_for('auditor_panel_add_worksheet', $outlet) ?>" title="Перейти к отчету по точке"><span class="badge badge-info"><?php echo count_worksheet_sku_b($outlet->getWorksheet()); ?></span></a>
			</td>
			<td>

			</td>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php endif; ?>
	</table>
	<?php include_partial('paginator', array('pager' => $pager)) ?>
</div>

<?php include_partial('client_panel/filters', array('form' => $filter)) ?>