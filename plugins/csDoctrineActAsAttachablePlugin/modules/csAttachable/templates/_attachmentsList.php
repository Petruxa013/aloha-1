<?php if ($attachments = $object->getAttachments()): ?>
	<?php if ($attachments->count()): ?>
		<?php $imageAttachments = ''; $audioAttachment = ''; ?>
			<?php foreach ($attachments as $attachment): ?>

					<?php if ($attachment->getType() == 'image'): ?>
						<?php $imageAttachments .= '<li>'.link_to(image_tag($attachment->getAttachmentResizedRoute(10, 10)), image_path($attachment->getOriginalUrl()), 'class=link target=_blank').'</li>' ?>
					<?php elseif ($attachment->getType() == 'audio'): ?>
						<?php $audioAttachment .= '<li>'.link_to($attachment->getTitle(), image_path($attachment->getAttachmentRoute()), 'class=link target=_blank').'</li>' ?>
					<?php endif;?>

			<?php endforeach ?>
		<h2><?php echo translateAttachmentType(trim('image')) ?></h2>
		<ul class='attachment'>
			<?php echo $imageAttachments ?>
		</ul>
		<h2><?php echo translateAttachmentType(trim('audio')) ?></h2>
		<ul class='attachment'>
			<?php echo $audioAttachment ?>
		</ul>
	<?php endif ?>
<?php endif ?>