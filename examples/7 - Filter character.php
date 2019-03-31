<?php

	require_once '../src/bootstrap.php';

	$api = RickAndMorty\Api::getInstance();
	$filter_character = $api->character()->filter([
		"name" => "rick",
		"gender" => "male"
	]);

	echo "<pre>";
	print_r($filter_character);