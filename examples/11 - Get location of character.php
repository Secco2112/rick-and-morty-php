<?php

	require_once '../src/bootstrap.php';

	$api = RickAndMorty\Api::getInstance();
	$location = $api->character()->get(1)->getLocation();

	echo "<pre>";
	print_r($location);