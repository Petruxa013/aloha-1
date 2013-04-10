<?php use_helper('I18N', 'Date') ?>
<?php include_partial('outlet/assets') ?>

<div class="page-header">

	<h1>Создание группы РТТ</h1>
</div>

<?php include_partial('outlet/flashes') ?>

<?php include_partial('outlet/parseFileFix', array('form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>

<div class="alert alert-info">
	<?php if(isset($notFound)): ?>
			<?php var_dump($notFound) ?>
	<?php endif ?>
</div>
