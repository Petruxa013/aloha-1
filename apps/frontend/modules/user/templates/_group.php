<?php
$groups = $sf_guard_user->getGroups();
foreach($groups as $group)
	echo $group;