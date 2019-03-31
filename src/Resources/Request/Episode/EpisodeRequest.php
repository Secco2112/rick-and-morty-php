<?php

	namespace RickAndMorty\Resources\Request\Episode;

	use RickAndMorty\Resources\Request\AbstractRequest;
	use RickAndMorty\Resources\Response\Episode\EpisodeResponse;


	class EpisodeRequest extends AbstractRequest {

		protected $path = "/episode/";
		protected $available_filters = ["name", "episode"];

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
					$episodes = [];
					foreach ($request as $key => $episode) {
						$episodes[] = new EpisodeResponse($episode);
					}
					return $episodes;
				} else {
					return new EpisodeResponse($request);
				}
			} else {
				return $this->getAll();
			}
		}


		public function getAll($page = 1) {
			$request = $this->request("GET", "?page={$page}");

			$parsed = json_decode($request, true);
			$episodes = [];
			foreach ($parsed["results"] as $key => $episode) {
				$episodes[] = new EpisodeResponse($episode);
			}

			return $episodes;
		}


		public function filter($args) {
			$this->checkAvailableFilters($args);

			$query = http_build_query($args);
			$request = $this->request("GET", "?{$query}");

			$parsed = json_decode($request, true);
			$episodes = [];
			foreach ($parsed["results"] as $key => $episode) {
				$episodes[] = new EpisodeResponse($episode);
			}

			return $episodes;
		}

	}