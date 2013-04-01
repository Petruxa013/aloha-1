<?php if ($pager->haveToPaginate()): ?>
<div class="pagination pagination-centered">
<ul>
	<?php if (!$pager->isFirstPage()): ?>
	<?php if(mb_strlen($pager->getFilters()) > 5): ?>
        <li><a href="<?php echo url_for('@auditor_panel_filter')?>?page=<?php echo $pager->getPreviousPage() ?><?php echo $pager->getFilters() ?>">&laquo;</a></li>
	<?php else: ?>
		<li><a href="<?php echo url_for('@auditor_panel')?>?page=<?php echo $pager->getPreviousPage() ?>">&laquo;</a></li>
	<?php endif; ?>
	<?php else: ?>
		<li class="active"><a href="#">&laquo;</a></li>
	<?php endif; ?>
	<?php foreach ($pager->getLinks() as $page): ?>
		<?php if($page == $pager->getFirstPage())
		         continue;
		?>
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
</div>
</ul>
<?php endif; ?>
