<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<?php include_http_metas() ?>
	<?php include_metas() ?>
	<?php include_title() ?>
	<link rel="shortcut icon" href="/favicon.ico"/>
	<?php include_stylesheets() ?>
	<?php include_javascripts() ?>
</head>
<body>
<?php //if ($sf_user->isAuthenticated() || true): ?>
	<?php include_partial('pageParts/headerMenu') ?>
<?php //endif ?>

<?php echo $sf_content ?>
</body>
</html>
