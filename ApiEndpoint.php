<?php
require 'Service.php';
require 'services/RecentGames.php';
require 'config/config.php';

class ApiEndpoint {
	private $api_key;
	private $registered_services;
	//http://prod.api.pvp.net/api/lol/na/v1.1/summoner/by-name/RiotSchmick?api_key=<key>
	private $api_head;
	private $api_tail;

	public function __construct(){
		$this->registered_services = array();
		$this->api_key =  "35da3603-59cc-4b24-8b87-8accc987c528";
		$this->api_head = "http://prod.api.pvp.net/api/lol/euw";
		$this->api_tail = "?api_key=";
		//$this->log = Logger::getLogger(__CLASS__);
	}
	/**
	* Services are stored in registered services
	* with a shorthandle
	* $registered_services['sum_last_game'] e.g.
	*/
	public function add_service($shorthandle){
		if(!array_key_exists($shorthandle, $this->registered_services)){
			$service = new $shorthandle();
			$this->registered_services[$shorthandle] = $service;
			return true;
		}
		else return false;
	}

	public function get_service_by_shorthand($shorthandle){
		if(array_key_exists($shorthandle, $this->registered_services))
			return $this->registered_services[$shorthandle];
			//$this->log->warn("registered service is not avl");
	}

	public function build_query_string($service){
		if($uri = $service->create_service_uri()){
			//$this->log->info($this->api_head.$uri.$this->api_tail.$this->api_key);
			return $this->api_head.$uri.$this->api_tail.$this->api_key;
		}
		else return false;
	}

//extend service by required


	
}
?>
