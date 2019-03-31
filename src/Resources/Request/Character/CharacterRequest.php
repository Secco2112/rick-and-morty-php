<?php

	namespace RickAndMorty\Resources\Request\Character;

	use RickAndMorty\Resources\Request\AbstractRequest;
	use RickAndMorty\Resources\Response\Character\CharacterResponse;


	class CharacterRequest extends AbstractRequest {

		protected $path = "/character/";
		protected $available_filters = [
				"name",
				"status" => [
					"available" => [
						"alive",
						"dead",
						"unknown"
					]
				],
				"species",
				"type",
				"gender" => [
					"available" => [
						"female",
						"male",
						"genderless",
						"unknown"
					]
				]
			];

		public function __construct() {}


		public function get(...$args) {
			$ids = [];

			foreach ($args as $key => $arg) {
				if(is_array($arg)) {
					$ids = array_merge($ids, $arg);
				} else {
					$ids[] = $arg;
				}
			}
			$ids = array_unique($ids);

			if($ids) {
				$request = $this->request("GET", implode(",", $ids));
				$request = json_decode($request);
				if(is_array($request)) {
					$characters = [];
					foreach ($request as $key => $character) {
						$characters[] = new CharacterResponse($character);
					}
					return $characters;
				} else {
					return new CharacterResponse($request);
				}
			} else {
				return $this->getAll();
			}
		}


		public function getAll($page = 1) {
			$request = $this->request("GET", "?page={$page}");

			$parsed = json_decode($request, true);
			$characters = [];
			foreach ($parsed["results"] as $key => $character) {
				$characters[] = new CharacterResponse($character);
			}

			return $characters;
		}


		public function filter($args) {
			$this->checkAvailableFilters($args);

			$query = http_build_query($args);
			$request = $this->request("GET", "?{$query}");

			$parsed = json_decode($request, true);
			$characters = [];
			foreach ($parsed["results"] as $key => $character) {
				$characters[] = new CharacterResponse($character);
			}

			return $characters;
		}

	}