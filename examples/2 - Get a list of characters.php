<?php

	require_once '../src/bootstrap.php';

	$api = RickAndMorty\Api::getInstance();
	$characters = $api->character()->get(1, 2, 17, 22); // Return characters 1, 2, 17 and 22
	/*
		OR
		$characters = $api->character()->get([1, 2, 17, 22]);
		OR
		$characters = $api->character()->get([1, 2], 17, 22);
		OR
		$characters = $api->character()->get([1, 2], 17, [22], 1);
		
		Yes, it accepts all this params types
	*/

	echo "<pre>";
	print_r($characters);