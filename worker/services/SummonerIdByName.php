<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 15:10
 */
/**
 * provides the pluggable summonerIdByName_service
 *
 */
class SummonerIdByName{
    private $summoner_name;
    private $id_set;
    private $uri_head;
    public function __construct(){
        $this->uri_head = "/v1.1/summoner/by-name/";
        $this->id_set = false;
        $this->summoner_name = null;
    }

    public function bind_param($name){
        $this->summoner_name = rawurlencode($name);
        $this->id_set = true;
    }

    public function create_service_uri(){
        if($this->id_set){
            return $this->uri_head.$this->summoner_name;
        }
        else
            return false;
    }


}

?>