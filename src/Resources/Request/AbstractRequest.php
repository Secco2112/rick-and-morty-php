<?php

	namespace RickAndMorty\Resources\Request;


	abstract class AbstractRequest {
		
		const REQUEST_METHOD_GET    = 'GET';
	    const REQUEST_METHOD_POST   = 'POST';
	    const REQUEST_METHOD_PUT    = 'PUT';
	    const REQUEST_METHOD_HEAD   = 'HEAD';
	    const REQUEST_METHOD_DELETE = 'DELETE';
	    const REQUEST_METHOD_PATCH  = 'PATCH';

	    const DEFAULT_SERVICE_BASE_URI = 'https://rickandmortyapi.com/api';

	    protected $headers = [];
    	protected $timeout = 15;

    	protected $path = '';


    	 public function __construct($baseUri = null, array $headers = []) {
			$this->headers = array_merge($this->headers, $headers);

			$defaults = [
				'headers' => $headers,
			];

			if (empty($baseUri)) {
				$baseUri = $this->getDefaultBaseUri();
			}

			return $this;
	    }


	    public function getDefaultBaseUri() {
        	return self::DEFAULT_SERVICE_BASE_URI;
    	}


    	public function setPath($path) {
    		$this->path = $path;
    		return $this;
    	}


    	public function getPath() {
    		return $this->path;
    	}


    	public function request($method, $uri="", $body = null) {
    		try{
    			$ch = curl_init($this->getDefaultBaseUri() . $this->getPath() . $uri);
    			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    			curl_setopt($ch, CURLOPT_HTTPHEADER, $this->getHeaders());
    			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    			if($method === self::REQUEST_METHOD_POST) {
    				curl_setopt($ch, CURLOPT_POST, true);
    				if(!is_null($body)) {
    					curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    				}
    			} else if($method === self::REQUEST_METHOD_PUT) {
    				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, self::REQUEST_METHOD_PUT);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    			}
    			$response = curl_exec($ch);
    			$error = curl_error($ch);
    			return $response;
    		} catch(Exception $e) {

    		}
    	}


    	public function getHeaders() {
	        return (array) $this->headers;
	    }


	    public function setHeaders(array $headers = [], $append = true, $replaceExisting = true) {
	        if (!$append) {
	            $this->headers = $headers;
	            return $this;
	        }
	        
	        foreach ($headers as $key => $value) {
	            if (isset($this->headers[$key]) && (false == $replaceExisting)) {
	                continue;
	            }
	            
	            $this->headers[$key] = $value;
	        }
	        
	        return $this;
	    }
	    
	}