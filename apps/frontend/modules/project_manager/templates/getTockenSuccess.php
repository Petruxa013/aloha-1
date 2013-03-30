<div class="info well container">
	<h2>Ссылка авторизации руководителя проекта <?php echo $user->getName() ?></h2>
		<div class="row container">
			<h4><?php echo url_for('signin_by_tocken', $user, true) ?></h4>
		</div>
		<div class="alert alert-danger">
			<strong>Будьте осторожны и не давайте эту ссылку другому человеку!</strong>
		</div>
		<a href="<?php echo url_for('project_manager')?>">
			<button class="btn btn-info">Вернуться к списку руководителей проекта</button>
		</a>
</div>
