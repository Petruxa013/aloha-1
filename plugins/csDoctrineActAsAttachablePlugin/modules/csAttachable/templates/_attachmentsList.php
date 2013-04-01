<?php if ($attachments = $object->getAttachments()): ?>
	<?php if ($attachments->count()): ?>
		<ul class='attachment'>
			<?php foreach ($attachments as $attachment): ?>
				<li>
					<?php if ($attachment->getType() == 'image'): ?>
						<?php echo link_to(image_tag($attachment->getAttachmentResizedRoute(10, 10)), image_path($attachment->getAttachmentResizedRoute(50, 50)), 'class=link target=_blank') ?>
					<?php else: ?>
						<?php echo link_to($attachment->getTitle(), image_path($attachment->getAttachmentRoute()), 'class=link target=_blank') ?>
					<?php endif;?>
				</li>
			<?php endforeach ?>
		</ul>
	<?php endif ?>
<?php endif ?>