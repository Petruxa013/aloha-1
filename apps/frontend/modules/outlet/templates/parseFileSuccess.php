<?php use_helper('I18N', 'Date') ?>
<?php include_partial('outlet/assets') ?>

<div class="page-header">

	<h1>Создание группы РТТ</h1>
</div>

<?php include_partial('outlet/flashes') ?>

<?php include_partial('outlet/parseFile', array('form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>

<div class="alert alert-info">
	<p>Формат файла:</p>
	<span>Сохранять следует с разделителем ";" (точка с запятой)</span>
	<table>
		<thead>
		<tr>
			<th>Карта</th>
			<th>PIN</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>{Серия} {Номер}</td>
			<td>{PIN}</td>
		</tr>
		</tbody>
	</table>
</div>
