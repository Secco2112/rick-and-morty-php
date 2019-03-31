<?php

	require_once '../src/bootstrap.php';

	$api = RickAndMorty\Api::getInstance();
	$episode = $api->episode()->get(1);
	/*
		OR
		$episode = $api->episode()->get([1]);
		It accepts array as param
	*/

	echo "<pre>";
	print_r($episode);