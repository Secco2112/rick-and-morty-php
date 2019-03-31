<?php

	require_once '../src/bootstrap.php';

	$api = RickAndMorty\Api::getInstance();
	$characters = $api->episode()->get(1)->getCharacters();

	echo "<pre>";
	print_r($characters);