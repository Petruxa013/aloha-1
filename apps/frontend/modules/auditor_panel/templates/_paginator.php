<?php if ($pager->haveToPaginate()): ?>
<div class="pagination pagination-centered">
<ul>
	<?php if(mb_strlen($pager->getFilters()) > 5): ?>
        <li><a href="<?php echo url_for('@auditor_panel_filter')?>?page=1<?php echo $pager->getFilters() ?>">&laquo;</a></li>
	<?php else: ?>
		<li><a href="<?php echo url_for('@auditor_panel')?>?page=1">&laquo;</a></li>
	<?php endif; ?>

	<?php if (!$pager->isFirstPage()): ?>
		<?php if(mb_strlen($pager->getFilters()) > 5): ?>
	        <li><a href="<?php echo url_for('@auditor_panel_filter')?>?page=<?php echo $pager->getPreviousPage() ?><?php echo $pager->getFilters() ?>">&larr;</a></li>
		<?php else: ?>
			<li><a href="<?php echo url_for('@auditor_panel')?>?page=<?php echo $pager->getPreviousPage() ?>">&larr;</a></li>
		<?php endif; ?>
	<?php endif; ?>

	<?php foreach ($pager->getLinks() as $page): ?>
	<?php if ($page == $pager->getPage()): ?>
        <li class="active"><a href="#"><?php echo $page ?></a></li>
		<?php else: ?>
		<?php if(mb_strlen($pager->getFilters()) > 5): ?>
			<li>
		       <a href="<?php echo url_for('@auditor_panel_filter') ?>?page=<?php echo $page ?><?php echo $pager->getFilters() ?>"><?php echo $page ?></a>
            </li>
		<?php else: ?>
			<li>
		       <a href="<?php echo url_for('@auditor_panel') ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
            </li>
		<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>

	<?php if (!$pager->isLastPage()): ?>
		<?php if(mb_strlen($pager->getFilters()) > 5): ?>
	        <li><a href="<?php echo url_for('@auditor_panel_filter')?>?page=<?php echo $pager->getNextPage() ?><?php echo $pager->getFilters() ?>">&rarr;</a></li>
		<?php else: ?>
			<li><a href="<?php echo url_for('@auditor_panel')?>?page=<?php echo $pager->getNextPage() ?>">&rarr;</a></li>
		<?php endif; ?>
	<?php endif; ?>


	<?php if(mb_strlen($pager->getFilters()) > 5): ?>
        <li><a href="<?php echo url_for('@auditor_panel_filter')?>?page=<?php echo $pager->getLastPage() ?><?php echo $pager->getFilters() ?>">&raquo;</a></li>
	<?php else: ?>
		<li><a href="<?php echo url_for('@auditor_panel')?>?page=<?php echo $pager->getLastPage() ?>">&raquo;</a></li>
	<?php endif; ?>

</div>
</ul>
<?php endif; ?>
