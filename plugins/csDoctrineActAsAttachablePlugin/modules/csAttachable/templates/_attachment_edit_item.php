<?php $title = $attachment->getTitle() ? $attachment->getTitle() : $attachment->getUrl() ?>

<?php if($attachment->getType()=='image'):?>
  <?php echo link_to(image_tag($attachment->getAttachmentResizedRoute(10,10)), image_path($attachment->getAttachmentResizedRoute(50,50)), 'class=link target=_blank') ?>
  <?php echo '<span>'.$title.'</span>'; ?>
<?php else:?>
  <?php echo link_to($attachment->getTitle(), image_path($attachment->getAttachmentRoute()), 'class=link target=_blank') ?>
<?php endif;?>

<?php $javascriptFunction = $javascriptHelper == 'jQuery' ? 'jq_link_to_remote' : 'link_to_remote' ?>

<?php echo $javascriptFunction('<button class="btn btn-danger">Удалить</button>',
            array(
              'url' => '@cs_attachable_delete?attachment_id='.$attachment->getId().
                                     '&object_id='.$object->getId().
                                     '&table='.$table.
                                     '&javascriptHelper='.$javascriptHelper,
              'update' => 'attachments_display',
            ), 
            array('class' => 'delete', 'confirm' => 'Файл будет удален. Вы уверены?')
        ) ?>
<?php if($attachment->getType()=='image'):?>
	<?php echo '<a href="#renameFile" class="btn btn-info" data-toggle="modal" name="changeAttachmentTitle" attachmentId="'.$attachment->getId().'">Переименовать</a>'; ?>
<?php endif ?>
<?php if($attachment->getType()=='document'):?>
	<?php echo '<input type="button" name="changeAttachmentTitle" value="Переименовать" attachmentId="'.$attachment->getId().'">' ?>
<?php endif ?>