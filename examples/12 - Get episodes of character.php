<?php

	require_once '../src/bootstrap.php';

	$api = RickAndMorty\Api::getInstance();
	$episodes = $api->character()->get(1)->getEpisodes();

	echo "<pre>";
	print_r($episodes);