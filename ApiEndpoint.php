<?php
require 'Serivce.php';

class ApiEndpoint {
	private $api_key = "35da3603-59cc-4b24-8b87-8accc987c528";
	private $registered_services;
	//http://prod.api.pvp.net/api/lol/na/v1.1/summoner/by-name/RiotSchmick?api_key=<key>
	private $api_head = "http://prod.api.pvp.net/api/lol/euw";

	public function __construct(){
		$this->registered_services = array();
		$this->api_key = $api_key;
	}
	/**
	* Services are stored in registered services
	* with a shorthandle
	* $registered_services['sum_last_game'] e.g.
	*/
	public function add_service($title, $uri, $shorthandle){
		if(!array_key_exists($shorthandle, $registered_services)){
			$service = new Service($title,$uri);
			$this->registered_services[$shorthandle] = $service;
		}
		else
			echo "used shorthandle is already set";
	}

	private function get_service_by_shorthand($shorthandle){
		if(array_key_exists($shorthandle, $registered_services))
			return $this->registered_services[$shorthandle];
		else
			echo "registered service is not avl";
	}

	public function build_query_string($service){
		$uri = $service->getUri();
		$query_string = 

	}

//extend service by required


	
}
?>
