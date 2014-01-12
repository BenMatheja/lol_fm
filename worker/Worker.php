<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 16:04
 */
require_once 'Config/Config.php';
require_once 'Config/Database.php';
require_once 'ApiEndpoint.php';


/**
 * Init the Worker
 */
class Worker
{
private $request_counter = 0;
private $name;
private $link;

    public function __construct($name){
        $this->link = Database::Get();
        $this->name = $name;
        $this->api_endpoint = new ApiEndpoint();
        $this->rp = new ResponseProcessor();
        $this->request = new Request($this->api_endpoint);


        $data = $rp->process($request->performRequest($request->buildRequest('SummonerIdByName', 'dwaynehart')));

        $this->persistWorker($name);
        $this->run();
    }

    private function persistWorker($name){
        $current_timestamp = date('Y-m-d H:i:s');
        $qry = 'INSERT INTO worker(name,requests_refreshed) VALUES("'.$name.'","'.$current_timestamp.'")';
        mysqli_query($this->link, $qry);
    }

    private function run(){

    }

    private function loadJobs(){

    }

}

$w = new Worker('hell');