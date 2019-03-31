<?php

	namespace RickAndMorty\Resources\Response\Character;

	use RickAndMorty\Resources\Response\ResponseAbstract;
	use RickAndMorty\Resources\Request\Location\LocationRequest;
	use RickAndMorty\Resources\Request\Episode\EpisodeRequest;


	class CharacterResponse extends ResponseAbstract {

		public function __construct($body) {
			parent::__construct($body);
		}


		public function getOrigin() {
			$origin = $this->origin;
			$origin_id = explode("/", $origin->url);
			$origin_id = $origin_id[count($origin_id)-1];

			$handler = new LocationRequest();
			$origin = $handler->get($origin_id);
			return $origin;
		}


		public function getLocation() {
			$location = $this->location;
			$location_id = explode("/", $location->url);
			$location_id = $location_id[count($location_id)-1];

			$handler = new LocationRequest();
			$location = $handler->get($location_id);
			return $location;
		}


		public function getEpisodes() {
			$ids = [];
			$episodes_object = $this->episode;
			foreach ($episodes_object as $key => $episode) {
				$episode_id = explode("/", $episode);
				$episode_id = $episode_id[count($episode_id)-1];
				$ids[] = $episode_id;
			}

			$handler = new EpisodeRequest();
			$episodes = $handler->get($ids);
			return $episodes;
		}

	}



