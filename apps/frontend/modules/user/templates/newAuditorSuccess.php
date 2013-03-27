<?php use_helper('I18N', 'Date') ?>
<?php include_partial('user/assets') ?>

  <div class="page-header">
    <h1><?php echo __('Добавление аудитора', array(), 'messages') ?></h1>
  </div>

  <?php include_partial('user/flashes') ?>

  <?php include_partial('user/form_header', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration)) ?>

  <?php include_partial('user/formWithActionSet', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper, 'action' => 'user_newAuditor')) ?>

  <?php include_partial('user/form_footer', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration)) ?>
