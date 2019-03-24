<?php

	namespace RickAndMorty\Resources\Response\Location;

	use RickAndMorty\Resources\Response\ResponseAbstract;
	use RickAndMorty\Resources\Request\Character\CharacterRequest;


	class LocationResponse extends ResponseAbstract {

		public function __construct($body) {
			parent::__construct($body);
		}


		public function getResidents() {
			$ids = [];
			$residents_object = $this->residents;
			foreach ($residents_object as $key => $resident) {
				$resident_id = explode("/", $resident);
				$resident_id = $resident_id[count($resident_id)-1];
				$ids[] = $resident_id;
			}

			$handler = new CharacterRequest();
			$residents = $handler->get($ids);
			return $residents;
		}

	}



