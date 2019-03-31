<?php

	require_once '../src/bootstrap.php';

	$api = RickAndMorty\Api::getInstance();
	$residents = $api->location()->get(1)->getResidents();

	echo "<pre>";
	print_r($residents);