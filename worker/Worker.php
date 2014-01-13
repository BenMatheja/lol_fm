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
    private $worker;

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
        $new_worker->name = $name;
        $new_worker->worker_id = $uid;
        $new_worker->requests_refreshed = date('Y-m-d H:i:s');
        $new_worker->save();
        $this->worker = $new_worker;
    }

    private function run()
    {
        //change to while after finishing work
        while (true) {
           if ($this->requestsLeft() > 0) {
                $this->loadJob();
                if ($this->job) {
                    $service_name = $this->job->serviceForJob();
                    $strategy = $this->job->strategy;
                    $response = $this->request->performRequest($this->request->buildRequest($service_name, $this->job->param));
                    if ($this->rp->$strategy($response, $this->job->summoner_id)) {

                        $this->job->fulfilled = 1;
                        $this->job->fulfilled_at = date('Y-m-d H:i:s');
                        $this->request_counter++;
                        $this->job->save();

                        $this->worker->requests_executed = $this->request_counter;
                        $this->worker->last_request = date('Y-m-d H:i:s');
                        $this->worker->requests_left = $this->requestsLeft() -1;
                        $this->worker->save();
                    }
                }
            }
        }
    }

    private function getRunState()
    {
        $runstate = ORM::for_table('worker')->select('run')->where('worker_id', $this->uid)->find_one()->run;
        if($runstate == 1) return true;
            else return false;

    }


    private function requestsLeft()
    {
        $requests_left = ORM::for_table('worker')->where('worker_id', $this->uid)->find_one()->requests_left;
        return $requests_left;
    }

    private function loadJob()
    {
        $job = Model::factory('Jobs')->order_by_asc('inserted')->limit(1)->where('fulfilled', 0)->find_one();
        $this->job = $job;
    }

}

$w = new Worker('machine spawned');
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