<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div id="filterPopup" class="modal hide fade">

	<form action="<?php echo url_for('auditor_panel_filter') ?>" method="get"
	      class="form-horizontal">

		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>

			<h3>Поиск по разделу</h3>
		</div>

		<div class="modal-body">

			<?php if ($form->hasGlobalErrors()): ?>
				<?php echo $form->renderGlobalErrors() ?>
			<?php endif; ?>

			<?php echo $form ?>

		</div>

		<div class="modal-footer">
			<button type="submit"
			        class="btn btn-primary"><?php echo __('<i class="icon-search icon-white"></i> Искать', array(), 'sf_admin') ?></button>
			<?php echo link_to(__('Reset', array(), 'sf_admin'), 'auditor_panel_filter', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' => 'btn')) ?>
		</div>

		<?php echo $form->renderHiddenFields() ?>

	</form>

</div>
