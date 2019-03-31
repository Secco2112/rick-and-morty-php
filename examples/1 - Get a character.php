<?php

	require_once '../src/bootstrap.php';

	$api = RickAndMorty\Api::getInstance();
	$character = $api->character()->get(1);
	/*
		OR
		$character = $api->character()->get([1]);
		It accepts array as param
	*/

	echo "<pre>";
	print_r($character);