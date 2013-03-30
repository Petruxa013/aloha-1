<?php use_helper('I18N') ?>

<div class="container">
<h1>Авторизуйтесь</h1>
</div>

<?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>