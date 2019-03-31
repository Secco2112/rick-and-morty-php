<?php

	require_once '../src/bootstrap.php';

	$api = RickAndMorty\Api::getInstance();
	$episodes = $api->episode()->get(1, 5, 10, 14); // Return episodes 1, 5, 10 and 14
	/*
		OR
		$episodes = $api->episode()->get([1, 5, 10, 14]);
		OR
		$episodes = $api->episode()->get([1, 5], 10, 14);
		OR
		$episodes = $api->episode()->get([1, 5], 10, [14], 1);
		
		Yes, it accepts all this params types
	*/

	echo "<pre>";
	print_r($episodes);