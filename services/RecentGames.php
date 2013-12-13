<?php
//require '../Service.php';
/**
* provides the pluggable recentgames_service
*
*/
class RecentGames{
	private $summoner_id;
	private $id_set;
	private $uri_head;
	private $uri_tail;
	public function __construct(){
		$this->uri_head = "/v1.1/game/by-summoner/";
		$this->uri_tail = "/recent";
		$this->id_set = false;
		$this->summoner_id = null;
	}

	public function bind_param($id){
		$this->summoner_id = $id;
		$this->id_set = true;
	}

	public function create_service_uri(){
		if($this->id_set){
			return $this->uri_head.$this->summoner_id.$this->uri_tail;
		}
		else
			return false;
	}

}

?>