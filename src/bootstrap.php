<?php

	spl_autoload_register(function($class) {
		$className = str_replace("RickAndMorty\\", "", $class);
		include_once $_SERVER['DOCUMENT_ROOT'] . '/rick-and-morty-api/src/' . $className . '.php';
	});