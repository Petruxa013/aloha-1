<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form class="form-horizontal" action="<?php echo url_for($action) ?>" enctype="multipart/form-data" method="POST">
  <?php echo $form->renderHiddenFields(false) ?>

  <?php if ($form->hasGlobalErrors()): ?>
    <?php echo $form->renderGlobalErrors() ?>
  <?php endif; ?>

  <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
    <?php include_partial('user/form_fieldset', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
  <?php endforeach; ?>
  
  <?php include_partial('user/form_actions', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</form>
