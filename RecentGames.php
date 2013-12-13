<?php
require 'Service.php';

class recentgames_service extends Service{
	private $summoner_id;

	private function bind_summoner_id($id){
		$this->summoner_id = $id;
	}

	

}

?>