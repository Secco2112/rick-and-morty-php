<?php

	namespace RickAndMorty\Resources\Response;


	abstract class ResponseAbstract {

		protected $data = [];


		public function __construct($body) {
			foreach ($body as $key => $value) {
				$this->$key = $value;
			}
		}


		public function  __get($key) {
	        if(array_key_exists($key, $this->data)) {
	            return $this->data[$key];
	        }
	        return null;
	    }


	    public function  __set($key, $value) {
	        $this->data[$key] = $value;
	    }


	    public function  __unset($key) {
	        unset($this->data[$key]);
	    }


	    public function  __isset($key) {
	        return array_key_exists($key, $this->data);
	    }


    	public function export(){
        	return $this->data;
    	}


    	public function toJson() {
    		return json_encode((array) $this->data);
    	}

	}