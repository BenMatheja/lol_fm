<?php
require_once 'Config/Config.php';

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
        $this->addAvailableServices();
	}

    public function __autoload($name){
        include 'services/'.$name . '.php';
    }
	/**
	* Services are stored in registered services
	* with a shorthandle
	* $registered_services['sum_last_game'] e.g.
	*/
	private function addService($shorthandle){
		if(!array_key_exists($shorthandle, $this->registered_services)){
            $this->__autoload($shorthandle);
			$service = new $shorthandle();
			$this->registered_services[$shorthandle] = $service;
			return true;
		}
		else return false;
	}


    /**
     * autoloader for services directory
     * adds available services at runtime
     */
    private function addAvailableServices(){
        $dir =  scandir('services');
        $service_array = array_diff($dir, array('.','..'));
        foreach( $service_array as $service) {
            $tmp = explode('.',$service);
            $this->addService($tmp[0]);
        }
    }
	public function getServiceByShorthand($shorthandle){
		if(array_key_exists($shorthandle, $this->registered_services))
			return $this->registered_services[$shorthandle];
			//$this->log->warn("registered service is not avl");
	}

	public function buildQueryString($service){
		if($uri = $service->create_service_uri()){
			//$this->log->info($this->api_head.$uri.$this->api_tail.$this->api_key);
			return $this->api_head.$uri.$this->api_tail.$this->api_key;
		}
		else return false;
	}

//extend service by required

/*$apiE->add_service('SummonerIdByName');
$apiE->add_service('RecentGames');*/
	
}
?>

