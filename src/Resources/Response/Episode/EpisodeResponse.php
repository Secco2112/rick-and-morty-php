<?php

	namespace RickAndMorty\Resources\Response\Episode;

	use RickAndMorty\Resources\Response\ResponseAbstract;
	use RickAndMorty\Resources\Request\Character\CharacterRequest;


	class EpisodeResponse extends ResponseAbstract {

		public function __construct($body) {
			parent::__construct($body);
		}


		public function getCharacters() {
			$ids = [];
			$characters_object = $this->characters;
			foreach ($characters_object as $key => $character) {
				$character_id = explode("/", $character);
				$character_id = $character_id[count($character_id)-1];
				$ids[] = $character_id;
			}

			$handler = new CharacterRequest();
			$characters = $handler->get($ids);
			return $characters;
		}

	}



