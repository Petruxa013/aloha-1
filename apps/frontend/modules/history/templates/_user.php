<?php /* @var $history History */ ?>
<?php
	$user = $history->getSfGuardUser();
	$groupNames = $user->getGroupNames();
	$group = '';
	foreach($groupNames as $name)
	{
		$group .= UserHelper::humanGroupName($name). ' ';
	}
	echo $user->getName().' [ '.$group.']';

?>
