<?php
require '../Service.php';
/**
* provides the pluggable recentgames_service
*
*/
class recentgames_service extends Service{
	private $summoner_id;
	private $id_set;
	private $uri_head = "/v1.1/game/by-summoner/"
	private $uri_tail = "/recent";
	public function __construct(){
		$this->uri_head = $uri_head;
		$this->uri_tail = $uri_tail;
		$this->id_set = false;
		$this->summoner_id = null;
	}

	public function bind_param($id){
		$this->summoner_id = $id;
		$this->id_set = true;
	}

	private function create_service_uri(){
		if($this->id_set){
			return $uri_head.$this->summoner_id.$uri_tail;
		}
		else
			return false;
	}

}

?>