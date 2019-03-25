<?php

	namespace RickAndMorty;

	use RickAndMorty\Resources\Request\Character\CharacterRequest;
	use RickAndMorty\Resources\Request\Location\LocationRequest;
	use RickAndMorty\Resources\Request\Episode\EpisodeRequest;


	class Api {

		private static $instance;


		private function __construct() {}

		public static function getInstance() {
			if (!isset(self::$instance)) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		public function character() {
			return new CharacterRequest();
		}

		public function location() {
			return new LocationRequest();
		}

		public function episode() {
			return new EpisodeRequest();
		}

	}