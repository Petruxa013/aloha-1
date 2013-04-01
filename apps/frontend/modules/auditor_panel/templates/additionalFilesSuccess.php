<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<div class="info well container">
		<a href="<?php echo url_for('auditor_panel')?>">
			<button class="btn btn-info">Вернуться к списку РТТ</button>
		</a>
	<?php if($sf_user->hasCredential('coordinator')): ?>
	<?php if($worksheet->getPhotoStatus() == 10): ?>
	<a href="<?php echo url_for('auditor_panel_approve_worksheet_photo', $outlet) ?>">
		<button type="button" class="btn btn-success">Одобрить фото</button>
	</a>
	<?php elseif($worksheet->getPhotoStatus() == 20): ?>
		<a href="<?php echo url_for('auditor_panel_disapprove_worksheet_photo', $outlet) ?>">
			<button type="button" class="btn btn-warning">Вернуть фото на доработку</button>
		</a>
	<?php endif; ?>

	<?php if($worksheet->getAudioStatus() == 10): ?>
	<a href="<?php echo url_for('auditor_panel_approve_worksheet_audio', $outlet) ?>">
		<button type="button" class="btn btn-success">Одобрить аудио</button>
	</a>
	<?php elseif($worksheet->getAudioStatus() == 20): ?>
		<a href="<?php echo url_for('auditor_panel_disapprove_worksheet_audio', $outlet) ?>">
			<button type="button" class="btn btn-warning">Вернуть аудио на доработку</button>
		</a>
	<?php endif; ?>

	<?php endif; ?>

</div>
<?php if(!$worksheet->getId()): ?>
	<div class="alert container">Пока вы не заполните анкету по этой точке загрузка данных невозможна</div>
<?php endif; ?>


<div class="container">
	<?php if($worksheet->getAudioStatus() == 20 && $worksheet->getPhotoStatus() == 20): ?>
	<?php include_component('csAttachable', 'attachmentsList', array('form' => $form)) ?>
	<?php else: ?>
	<?php include_component('csAttachable', 'attachments', array('form' => $form)) ?>
	<?php endif; ?>
</div>
<div id="renameFile" class="modal hide fade">
	<form>
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>

			<h3>Переименовать файл</h3>
		</div>

		<div class="modal-body">
			<label for="name">Название</label>
			<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" style="width: 90%"/>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Сохранить</button>
			<button class="btn" data-dismiss="modal">Отмена</button>
		</div>
	</form>
</div>
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