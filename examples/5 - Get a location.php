<?php

	require_once '../src/bootstrap.php';

	$api = RickAndMorty\Api::getInstance();
	$location = $api->location()->get(1);
	/*
		OR
		$location = $api->location()->get([1]);
		It accepts array as param
	*/

	echo "<pre>";
	print_r($location);