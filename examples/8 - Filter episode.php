<?php

	require_once '../src/bootstrap.php';

	$api = RickAndMorty\Api::getInstance();
	$filter_episode = $api->episode()->filter([
		"name" => "Pilot"
	]);

	echo "<pre>";
	print_r($filter_episode);