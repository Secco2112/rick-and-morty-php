<?php

	namespace RickAndMorty\Resources\Request\Location;

	use RickAndMorty\Resources\Request\AbstractRequest;
	use RickAndMorty\Resources\Response\Location\LocationResponse;


	class LocationRequest extends AbstractRequest {

		protected $path = "/location/";

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
					$locations = [];
					foreach ($request as $key => $location) {
						$locations[] = new LocationResponse($location);
					}
					return $locations;
				} else {
					return new LocationResponse($request);
				}
			} else {
				return $this->getAll();
			}
		}


		public function getAll($page = 1) {
			$request = $this->request("GET", "?page={$page}");

			$parsed = json_decode($request, true);
			$locations = [];
			foreach ($parsed["results"] as $key => $location) {
				$locations[] = new LocationResponse($location);
			}

			return $locations;
		}


		public function filter($args) {
			$available_filters = ["name", "type", "dimension"];

			foreach ($args as $key => $q) {
				if(!in_array($key, $available_filters)) {
					throw new \InvalidArgumentException("'{$key}' is not an available filter.", 1);
				}
			}

			$query = http_build_query($args);
			$request = $this->request("GET", "?{$query}");

			$parsed = json_decode($request, true);
			$locations = [];
			foreach ($parsed["results"] as $key => $location) {
				$locations[] = new LocationResponse($location);
			}

			return $locations;
		}

	}