<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<div class="info well container">
		<a href="<?php echo url_for('auditor_panel')?>">
			<button class="btn btn-info">Вернуться к списку РТТ</button>
		</a>
</div>

<div class="container">
	<?php include_component('csAttachable', 'attachments', array('form' => $form)) ?>
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

<script type="text/javascript">
	$(function () {
		var target;
		$('a[name="changeAttachmentTitle"]').click(function () {
			target = $(this);
			$("#renameFile > form").find('input#name').val(target.parent('li').children('span').html());
		});
		$("#renameFile > form").submit(function () {
			var name = $("#name");
			$.post('<?php echo url_for('auditor_panel_worksheet_additional_files_rename', $outlet) ?>',
					{
						attachmentId: target.attr('attachmentid'),
						title: name.val()
					}, function() {
						target.parent('li').children('span').html(name.val());
						$('a.close').click();
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