<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 14/01/14
 * Time: 03:10
 */
/**
 * provides the pluggable summonerIdByName_service
 *
 */
class SummonerNameByid{
    private $summoner_id;
    private $id_set;
    private $uri_head;
    public function __construct(){
        $this->uri_head = "/v1.2/summoner/";
        $this->id_set = false;
        $this->summoner_id = null;
    }

    public function bind_param($id){
        $this->summoner_id = $id;
        $this->id_set = true;
    }

    public function create_service_uri(){
        if($this->id_set){
            return $this->uri_head.$this->summoner_id;
        }
        else
            return false;
    }
}

?>