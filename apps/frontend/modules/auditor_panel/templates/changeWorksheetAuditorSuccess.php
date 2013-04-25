<div class="info well container">
	<h2>Сменить аудитора анкеты</h2>
	<h3><?php echo $outlet->getCity() ?> / <?php echo $outlet->getActualName() ?> / <?php echo $outlet->getAddress() ?></h3>
	<?php $filters = $sf_user->getAttribute('auditor_panel.filter', array(), 'auditor_panel_module') ?>
	<?php $page = $sf_user->getAttribute('auditor_panel.page', 1, 'auditor_panel_module') ?>

	<form action="<?php echo url_for('auditor_panel_change_auditor', $outlet) ?>" method="post">
		<?php echo $form ?>
		<br />
		<button class="btn" type="submit">Сохранить</button>
	</form>

	<a href="<?php echo url_for('auditor_panel_filter') . '?' . http_build_query(array('auditor_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page ?>">
		<button class="btn btn-info">Вернуться к списку РТТ</button>
	</a>
</div>
