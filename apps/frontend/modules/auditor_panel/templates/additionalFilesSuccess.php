<?php use_helper('Date') ?>
<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<div class="info well container">
	<h3><?php echo $outlet->getCity() ?> / <?php echo $outlet->getActualName() ?> / <?php echo $outlet->getAddress() ?></h3>
	<?php $filters = $sf_user->getAttribute('auditor_panel.filter', array(), 'auditor_panel_module') ?>
	<?php $page = $sf_user->getAttribute('auditor_panel.page', 1, 'auditor_panel_module') ?>
	<a href="<?php echo url_for('auditor_panel_filter') . '?' . http_build_query(array('auditor_panel_filter' => sfOutputEscaper::unescape($filters))).'&page='.$page ?>">
			<button class="btn btn-info">Вернуться к списку РТТ</button>
		</a>

	<?php if($sf_user->hasCredential('coordinator')): ?>

	<?php if($worksheet->getPhotoStatus() <= 10): ?>
	<a class="action" href="<?php echo url_for('auditor_panel_approve_worksheet_photo', $outlet) ?>">
		<button type="button" class="btn btn-success">Одобрить фото</button>
	</a>
	<a href="#disaprovePhotoPopup" class="btn btn-danger" data-toggle="modal">Вернуть фото на доработку</a>
	<?php elseif($worksheet->getPhotoStatus() == 20): ?>
	<a href="#disaprovePhotoPopup" class="btn btn-danger" data-toggle="modal">Вернуть фото на доработку</a>
	<?php endif; ?>

	<?php if($worksheet->getAudioStatus() <= 10): ?>
	<a class="action" href="<?php echo url_for('auditor_panel_approve_worksheet_audio', $outlet) ?>">
		<button type="button" class="btn btn-success">Одобрить аудио</button>
	</a>
	<a href="#disaproveAudioPopup" class="btn btn-danger" data-toggle="modal">Вернуть аудио на доработку</a>
	<?php elseif($worksheet->getAudioStatus() == 20): ?>
	<a href="#disaproveAudioPopup" class="btn btn-danger" data-toggle="modal">Вернуть аудио на доработку</a>
	<?php endif; ?>
	<?php endif; ?>


	<?php if($sf_user->hasCredential('project_manager')): ?>
	<?php if($worksheet->getPhotoStatus() <= 20): ?>
	<a class="action" href="<?php echo url_for('auditor_panel_approve_worksheet_photo', $outlet) ?>">
		<button type="button" class="btn btn-success">Одобрить фото</button>
	</a>
	<a href="#disaprovePhotoPopup" class="btn btn-danger" data-toggle="modal">Вернуть фото на доработку</a>
	<?php elseif($worksheet->getPhotoStatus() == 30): ?>
	<a href="#disaprovePhotoPopup" class="btn btn-danger" data-toggle="modal">Вернуть фото на доработку</a>
	<?php endif; ?>

	<?php if($worksheet->getAudioStatus() <= 20): ?>
	<a class="action" href="<?php echo url_for('auditor_panel_approve_worksheet_audio', $outlet) ?>">
		<button type="button" class="btn btn-success">Одобрить аудио</button>
	</a>
	<a href="#disaproveAudioPopup" class="btn btn-danger" data-toggle="modal">Вернуть аудио на доработку</a>
	<?php elseif($worksheet->getAudioStatus() == 30): ?>
	<a href="#disaproveAudioPopup" class="btn btn-danger" data-toggle="modal">Вернуть аудио на доработку</a>
	<?php endif; ?>
	<?php endif; ?>

</div>
<?php if(!$worksheet->getId()): ?>
	<div class="alert container">Пока вы не заполните анкету по этой точке загрузка данных невозможна</div>
<?php endif; ?>

<?php if($worksheet->getPhotoStatus() === null): ?>
<div class="alert alert-danger container">
	<div class="row container">
		Фото было возвращена на доработку.
	</div>
<?php foreach($historyDissaprovePhoto as $history): ?>
	<div class="row container">
		<?php echo format_datetime($history->getCreatedAt()).' <b>Причина: '.$history->getComment().'</b>' ?>
	</div>
<?php endforeach; ?>
</div>
<?php endif ?>

<?php if($worksheet->getAudioStatus() === null): ?>
<div class="alert alert-danger container">
	<div class="row container">
		Аудио было возвращена на доработку.
	</div>
<?php foreach($historyDissaproveAudio as $history): ?>
	<div class="row container">
		<?php echo format_datetime($history->getCreatedAt()).' <b>Причина: '.$history->getComment().'</b>' ?>
	</div>
<?php endforeach; ?>
</div>
<?php endif ?>


<div class="container">
	<?php if($worksheet->getAudioStatus() >= 20 && $worksheet->getPhotoStatus() >= 20): ?>
	<?php include_component('csAttachable', 'attachmentsList', array('form' => $form)) ?>
	<?php else: ?>
	<?php include_component('csAttachable', 'attachments', array('form' => $form)) ?>
	<?php endif; ?>
</div>

<?php if($sf_user->hasCredential('project_manager') || $sf_user->hasCredential('coordinator')): ?>
<div id="disaprovePhotoPopup" class="modal hide fade">

	<form action="<?php echo url_for('auditor_panel_disapprove_worksheet_photo', $outlet) ?>" method="post"  class="form-horizontal">

		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>

			<h3>Вернуть фото на доработку</h3>
		</div>

		<div class="modal-body">
			<label>Комментраий к действию</label>
			<textarea cols="10" rows="3" name="comment" style="width: 97%"></textarea>
		</div>

		<div class="modal-footer">
			<button type="submit" class="btn btn-danger">Вернуть фото на доработку</button>
			<button type="reset" class="btn">Отмена</button>
		</div>

	</form>

</div>
<?php endif; ?>

<?php if($sf_user->hasCredential('project_manager') || $sf_user->hasCredential('coordinator')): ?>
<div id="disaproveAudioPopup" class="modal hide fade">

	<form action="<?php echo url_for('auditor_panel_disapprove_worksheet_audio', $outlet) ?>" method="post"  class="form-horizontal">

		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>

			<h3>Вернуть аудио на доработку</h3>
		</div>

		<div class="modal-body">
			<label>Комментраий к действию</label>
			<textarea cols="10" rows="3" name="comment" style="width: 97%"></textarea>
		</div>

		<div class="modal-footer">
			<button type="submit" class="btn btn-danger">Вернуть аудио на доработку</button>
			<button type="reset" class="btn">Отмена</button>
		</div>

	</form>

</div>
<?php endif; ?>


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