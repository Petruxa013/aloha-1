<?php use_helper('Worksheet', 'Status') ?>
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
<?php $filterValues = $sf_user->getRawValue()->getAttribute('client_panel.filter', array(), 'client_panel_module');
if (!empty($filterValues)): ?>
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
		<a href="<?php echo url_for('@client_panel_export_excel') ?>" target="_blank">
			<button class="btn"><i class="icon-download"></i> Выгрузить в Excel</button>
		</a>
		<?php if (!empty($filterValues)): ?>
			<div class="span4 alert alert-info">
				Будут выгружены только отфильтрованные данные
			</div>
		<?php endif ?>
		<?php include_partial('paginator', array('pager' => $pager)) ?>
		<?php $filters = $sf_user->getAttribute('client_panel.filter', array(), 'client_panel_module') ?>
		<?php $page = $sf_user->getAttribute('client_panel.page', 1, 'client_panel_module') ?>
		<table class="table table-bordered" style="margin-top: 15px;">
			<tr>
				<th>
					<?php if ('distributor_id' == $sort[0]): ?>
						<?php echo link_to(__('Дистрибьютор <i class="icon-chevron-' . (($sort[1] == 'asc') ? 'down' : 'up') . '"></i>', array(), 'messages'), '@'.$route, array('query_string' => http_build_query(array('client_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page.'&sort=distributor_id&sort_type=' . ($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
					<?php else: ?>
						<?php echo link_to(__('Дистрибьютор', array(), 'messages'), '@'.$route, array('query_string' => http_build_query(array('client_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page.'&sort=distributor_id&sort_type=asc')) ?>
					<?php endif; ?>
					</th>
				<th>
					<?php if ('lagal_name' == $sort[0]): ?>
						<?php echo link_to(__('Юридическое название РТТ <i class="icon-chevron-' . (($sort[1] == 'asc') ? 'down' : 'up') . '"></i>', array(), 'messages'), '@'.$route, array('query_string' => http_build_query(array('client_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page.'&sort=lagal_name&sort_type=' . ($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
					<?php else: ?>
						<?php echo link_to(__('Юридическое название РТТ', array(), 'messages'), '@'.$route, array('query_string' => http_build_query(array('client_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page.'&sort=lagal_name&sort_type=asc')) ?>
					<?php endif; ?>
				</th>
				<th>
					<?php if ('actual_name' == $sort[0]): ?>
						<?php echo link_to(__('Название РТТ <i class="icon-chevron-' . (($sort[1] == 'asc') ? 'down' : 'up') . '"></i>', array(), 'messages'), '@'.$route, array('query_string' => http_build_query(array('client_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page.'&sort=actual_name&sort_type=' . ($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
					<?php else: ?>
						<?php echo link_to(__('Название РТТ', array(), 'messages'), '@'.$route, array('query_string' => http_build_query(array('client_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page.'&sort=actual_name&sort_type=asc')) ?>
					<?php endif; ?>
				</th>
				<th>
					<?php if ('address' == $sort[0]): ?>
						<?php echo link_to(__('Адрес <i class="icon-chevron-' . (($sort[1] == 'asc') ? 'down' : 'up') . '"></i>', array(), 'messages'), '@'.$route, array('query_string' => http_build_query(array('client_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page.'&sort=address&sort_type=' . ($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
					<?php else: ?>
						<?php echo link_to(__('Адрес', array(), 'messages'), '@'.$route, array('query_string' => http_build_query(array('client_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page.'&sort=address&sort_type=asc')) ?>
					<?php endif; ?>
				</th>
				<th>
					<?php if ('region_id' == $sort[0]): ?>
						<?php echo link_to(__('Регион <i class="icon-chevron-' . (($sort[1] == 'asc') ? 'down' : 'up') . '"></i>', array(), 'messages'), '@'.$route, array('query_string' => http_build_query(array('client_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page.'&sort=region_id&sort_type=' . ($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
					<?php else: ?>
						<?php echo link_to(__('Регион', array(), 'messages'), '@'.$route, array('query_string' => http_build_query(array('client_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page.'&sort=region_id&sort_type=asc')) ?>
					<?php endif; ?>
				</th>
				<th>
					<?php if ('city_id' == $sort[0]): ?>
						<?php echo link_to(__('Город <i class="icon-chevron-' . (($sort[1] == 'asc') ? 'down' : 'up') . '"></i>', array(), 'messages'), '@'.$route, array('query_string' => http_build_query(array('client_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page.'&sort=city_id&sort_type=' . ($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
					<?php else: ?>
						<?php echo link_to(__('Город', array(), 'messages'), '@'.$route, array('query_string' => http_build_query(array('client_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page.'&sort=city_id&sort_type=asc')) ?>
					<?php endif; ?>
				</th>
				<th>
					<?php if ('type' == $sort[0]): ?>
						<?php echo link_to(__('Тип РТТ <i class="icon-chevron-' . (($sort[1] == 'asc') ? 'down' : 'up') . '"></i>', array(), 'messages'), '@'.$route, array('query_string' => http_build_query(array('client_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page.'&sort=type&sort_type=' . ($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
					<?php else: ?>
						<?php echo link_to(__('Тип РТТ', array(), 'messages'), '@'.$route, array('query_string' => http_build_query(array('client_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page.'&sort=type&sort_type=asc')) ?>
					<?php endif; ?>
				</th>
				<th>
					<?php if ('group_type' == $sort[0]): ?>
						<?php echo link_to(__('Группа <i class="icon-chevron-' . (($sort[1] == 'asc') ? 'down' : 'up') . '"></i>', array(), 'messages'), '@'.$route, array('query_string' => http_build_query(array('client_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page.'&sort=group_type&sort_type=' . ($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
					<?php else: ?>
						<?php echo link_to(__('Группа', array(), 'messages'), '@'.$route, array('query_string' => http_build_query(array('client_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page.'&sort=group_type&sort_type=asc')) ?>
					<?php endif; ?>

				</th>
				<th>Наличие SKU в торговой точке
					(в торговом зале или на складе),
				</th>
				<th>Наличие минимального кол-ва = 4 шт (торговый зал + склад)</th>
				<th>Результат</th>
			</tr>
			<?php $outlets = $pager->getResults() ?>
			<?php if (count($outlets) > 0): ?>
				<?php foreach ($outlets as $key => $outlet): ?>
					<?php /* @var $outlet Outlet */ ?>
					<tr>
						<td><?php echo $outlet->getDistributor() ?></td>
						<td><?php echo $outlet->getLagalName() ?></td>
						<td><?php echo $outlet->getActualName() ?></td>
						<td><?php echo $outlet->getAddress() ?></td>
						<td><?php echo $outlet->getRegion() ?></td>
						<td><?php echo $outlet->getCity() ?></td>
						<td><?php echo $outlet->getHumanType() ?></td>
						<td><?php echo strtoupper($outlet->getGroupType()) ?></td>
						<td>
							<a href="<?php echo url_for('client_panel_show_worksheet', $outlet) ?>"
							   title="Перейти к отчету по точке"><?php echo count_worksheet_sku_a($outlet->getWorksheet()); ?></a>
						</td>
						<td>
							<a href="<?php echo url_for('client_panel_show_worksheet', $outlet) ?>"
							   title="Перейти к отчету по точке"><?php echo count_worksheet_sku_b($outlet->getWorksheet()); ?></a>
						</td>
						<td>
							<?php echo worksheet_audit_status($outlet, true) ?>
						</td>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</table>
		<?php include_partial('paginator', array('pager' => $pager)) ?>
	</div>

<?php include_partial('client_panel/filters', array('form' => $filter)) ?>