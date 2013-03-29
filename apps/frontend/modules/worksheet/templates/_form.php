<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@worksheet', array('class' => 'form-horizontal')) ?>
  <?php echo $form->renderHiddenFields(false) ?>

  <?php if ($form->hasGlobalErrors()): ?>
    <?php echo $form->renderGlobalErrors() ?>
  <?php endif; ?>

  <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
    <?php include_partial('worksheet/form_fieldset', array('worksheet' => $worksheet, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
  <?php endforeach; ?>
  
  <?php include_partial('worksheet/form_actions', array('worksheet' => $worksheet, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</form>
<?php if ($form->getObject()->getId()): ?>
	<?php include_component('csAttachable', 'attachments', array('form' => $form)) ?>
<?php endif; ?>
