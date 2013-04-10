<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<div class="info well container">
	<h3><?php echo $outlet->getCity() ?> / <?php echo $outlet->getActualName() ?> / <?php echo $outlet->getAddress() ?></h3>
	<?php $filters = $sf_user->getAttribute('auditor_panel.filter', array(), 'auditor_panel_module') ?>
	<a href="<?php echo url_for('auditor_panel_filter') . '?' . http_build_query(array('auditor_panel_filter' => sfOutputEscaper::unescape($filters))) ?>">
			<button class="btn btn-info">Вернуться к списку РТТ</button>
		</a>

	<?php if($sf_user->hasCredential('coordinator')): ?>

	<?php if($worksheet->getPhotoStatus() <= 10): ?>
	<a class="action" href="<?php echo url_for('auditor_panel_approve_worksheet_photo', $outlet) ?>">
		<button type="button" class="btn btn-success">Одобрить фото</button>
	</a>
	<a class="action" href="<?php echo url_for('auditor_panel_disapprove_worksheet_photo', $outlet) ?>">
		<button type="button" class="btn btn-danger">Вернуть фото на доработку</button>
	</a>
	<?php elseif($worksheet->getPhotoStatus() == 20): ?>
		<a class="action" href="<?php echo url_for('auditor_panel_disapprove_worksheet_photo', $outlet) ?>">
			<button type="button" class="btn btn-danger">Вернуть фото на доработку</button>
		</a>
	<?php endif; ?>

	<?php if($worksheet->getAudioStatus() <= 10): ?>
	<a class="action" href="<?php echo url_for('auditor_panel_approve_worksheet_audio', $outlet) ?>">
		<button type="button" class="btn btn-success">Одобрить аудио</button>
	</a>
	<a class="action" href="<?php echo url_for('auditor_panel_disapprove_worksheet_audio', $outlet) ?>">
		<button type="button" class="btn btn-danger">Вернуть аудио на доработку</button>
	</a>
	<?php elseif($worksheet->getAudioStatus() == 20): ?>
	<a class="action" href="<?php echo url_for('auditor_panel_disapprove_worksheet_audio', $outlet) ?>">
		<button type="button" class="btn btn-danger">Вернуть аудио на доработку</button>
	</a>
	<?php endif; ?>
	<?php endif; ?>


	<?php if($sf_user->hasCredential('project_manager')): ?>
	<?php if($worksheet->getPhotoStatus() <= 20): ?>
	<a class="action" href="<?php echo url_for('auditor_panel_approve_worksheet_photo', $outlet) ?>">
		<button type="button" class="btn btn-success">Одобрить фото</button>
	</a>
	<a class="action" href="<?php echo url_for('auditor_panel_disapprove_worksheet_photo', $outlet) ?>">
		<button type="button" class="btn btn-danger">Вернуть фото на доработку</button>
	</a>
	<?php elseif($worksheet->getPhotoStatus() == 30): ?>
	<a class="action" href="<?php echo url_for('auditor_panel_disapprove_worksheet_photo', $outlet) ?>">
		<button type="button" class="btn btn-danger">Вернуть фото на доработку</button>
	</a>
	<?php endif; ?>

	<?php if($worksheet->getAudioStatus() <= 20): ?>
	<a class="action" href="<?php echo url_for('auditor_panel_approve_worksheet_audio', $outlet) ?>">
		<button type="button" class="btn btn-success">Одобрить аудио</button>
	</a>
	<a class="action" href="<?php echo url_for('auditor_panel_disapprove_worksheet_audio', $outlet) ?>">
		<button type="button" class="btn btn-danger">Вернуть аудио на доработку</button>
	</a>
	<?php elseif($worksheet->getAudioStatus() == 30): ?>
		<a class="action" href="<?php echo url_for('auditor_panel_disapprove_worksheet_audio', $outlet) ?>">
			<button type="button" class="btn btn-danger">Вернуть аудио на доработку</button>
		</a>
	<?php endif; ?>
	<?php endif; ?>

</div>
<?php if(!$worksheet->getId()): ?>
	<div class="alert container">Пока вы не заполните анкету по этой точке загрузка данных невозможна</div>
<?php endif; ?>


<div class="container">
	<?php if($worksheet->getAudioStatus() >= 20 && $worksheet->getPhotoStatus() >= 20): ?>
	<?php include_component('csAttachable', 'attachmentsList', array('form' => $form)) ?>
	<?php else: ?>
	<?php include_component('csAttachable', 'attachments', array('form' => $form)) ?>
	<?php endif; ?>
</div>
<script type="text/javascript">
	$(function () {
		$('a.action').click(function() {
			$.post($(this).attr('href'), function(data) {
				window.location = data.url;
			});
			return false;
		});
	});
</script>
<style>
	.attachment li a.btn:hover {
		color: #ffffff;
		background-color: #2f96b4;
		*background-color: #2a85a0;
	}
	.attachment li {
		list-style: none;
	}
</style>