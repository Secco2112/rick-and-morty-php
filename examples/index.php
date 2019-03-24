<?php

	$api = RickAndMorty\Api::getInstance();
	$episode = $api->episode();

	$request = $episode->get(1);

	echo "<pre>";
	print_r($request->getCharacters());