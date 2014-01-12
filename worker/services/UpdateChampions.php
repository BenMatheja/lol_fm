<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 21:38
 */
/**
 * provides the pluggable updatechampions service
 *
 */
class UpdateChampions{
    private $id_set;
    private $uri_head;

    public function __construct(){
        $this->uri_head = "/v1.1/champion";
        $this->id_set = false;
        $this->summoner_id = null;
    }

    public function bind_param($id){
        $this->summoner_id = $id;
        $this->id_set = true;
    }

    public function create_service_uri(){
    return $this->uri_head;

    }

}

?>