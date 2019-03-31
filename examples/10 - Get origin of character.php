<?php

	require_once '../src/bootstrap.php';

	$api = RickAndMorty\Api::getInstance();
	$origin = $api->character()->get(1)->getOrigin();

	echo "<pre>";
	print_r($origin);