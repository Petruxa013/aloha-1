<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

  <form action="<?php echo url_for('outlet/parseFileFix_create') ?>" method="POST" enctype="multipart/form-data">
    <?php echo $form->renderHiddenFields(true) ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

	<?php echo $form ?>	
    <input type="submit" value="Загрузить" />
  </form>
