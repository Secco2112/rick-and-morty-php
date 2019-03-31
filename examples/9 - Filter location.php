<?php

	require_once '../src/bootstrap.php';

	$api = RickAndMorty\Api::getInstance();
	$filter_location = $api->location()->filter([
		"name" => "Rick"
	]);

	echo "<pre>";
	print_r($filter_location);