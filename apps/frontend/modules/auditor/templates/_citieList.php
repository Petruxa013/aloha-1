<?php
foreach($sf_guard_user->getCities() as $city):
	echo $city.', ';
endforeach;