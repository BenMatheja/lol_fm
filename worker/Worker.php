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
require_once 'ResponseProcessor.php';
require_once 'Request.php';
require_once '../models/Jobs.php';


/**
 * Init the Worker
 */
class Worker
{
    private $request_counter = 0;
    private $name;
    private $link;
    private $api_endpoint;
    private $rp;
    private $request;
    private $jobs;
    private $uid;

    public function __construct($name)
    {
        $this->link = Database::Get();
        $this->name = $name;
        $this->api_endpoint = new ApiEndpoint();
        $this->rp = new ResponseProcessor();
        $this->request = new Request($this->api_endpoint);
        $this->uid = uniqid();
        $this->persistWorker($this->name, $this->uid);
        $this->run();
    }

    private function persistWorker($name, $uid)
    {
        $new_worker = ORM::for_table('worker')->create();
        $new_worker ->name = $name;
        $new_worker->worker_id = $uid;
        $new_worker->requests_refreshed = date('Y-m-d H:i:s');
        $new_worker->save();
    }

    private function run()
    {
        //change to while after finishing work
        if ($this->getRunState()) {
            $this->loadJob();
            //if requests left
            //perform request
            /*$service = $this->api_endpoint->getServiceByShorthand($service_name);
            $service->bind_param($this->job->param);*/
            $service_name = $this->job->serviceForJob();
            $strategy = $this->job->strategy;
            $response = $this->request->performRequest($this->request->buildRequest($service_name,$this->job->param));
            if($this->rp->$strategy($response,$this->job->summoner_id)){
                $this->job->fulfilled = 1;
                $this->job->fulfilled_at = date('Y-m-d H:i:s');
                $this->job->save();
            }

        }
    }

    private function executeJob($job){
        if($job->service == '1'){
           //get metadata out of job
           //trigger processor with the right action
           //persist it into the right database

        }
    }

    private function getRunState()
    {
      $runstate = ORM::for_table('worker')->select('run')->where('worker_id', $this->uid)->find_one();
      return $runstate;
    }

    private function loadJob(){
       $job = Model::factory('Jobs')->order_by_asc('inserted')->limit(1)->where('fulfilled',0)->find_one();
       $this->job = $job;
    }

}

$w = new Worker('hell');
// $data = $rp->process($request->performRequest($request->buildRequest('SummonerIdByName', 'dwaynehart')));
/*
array (size=2)
0 =>
array (size=6)
'id' => string '1' (length=1)
'service' => string '1' (length=1)
'param' => string 'DwayneHart' (length=10)
'summoner_id' => string '2' (length=1)
'inserted' => string '2014-01-12 17:09:41' (length=19)
'fulfilled' => string '0' (length=1)
1 =>
array (size=6)
'id' => string '2' (length=1)
'service' => string '2' (length=1)
'param' => string '19646272' (length=8)
'summoner_id' => string '1' (length=1)
'inserted' => string '2014-01-12 17:55:01' (length=19)
'fulfilled' => string '0' (length=1)*/