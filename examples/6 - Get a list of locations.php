<?php

	require_once '../src/bootstrap.php';

	$api = RickAndMorty\Api::getInstance();
	$locations = $api->location()->get(1, 2, 17, 22); // Return locations 1, 2, 17 and 22
	/*
		OR
		$locations = $api->location()->get([1, 2, 17, 22]);
		OR
		$locations = $api->location()->get([1, 2], 17, 22);
		OR
		$locations = $api->location()->get([1, 2], 17, [22], 1);
		
		Yes, it accepts all this params types
	*/

	echo "<pre>";
	print_r($locations);