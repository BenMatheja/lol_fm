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
 * build to cron
 */
class Worker
{
    private $request_counter = 0;
    private $api_endpoint;
    private $rp;
    private $request;

    public function __construct()
    {
        $this->api_endpoint = new ApiEndpoint();
        $this->rp = new ResponseProcessor();
        $this->request = new Request($this->api_endpoint);
        $this->run();
    }

    private function run()
    {
        $this->loadJobs();
        if ($this->jobs) {
            foreach ($this->jobs as $job) {
                $service_name = $job->serviceForJob();
                $strategy = $job->strategy;
                $response = $this->request->performRequest($this->request->buildRequest($service_name, $job->param));
                if ($this->rp->$strategy($response, $job->summoner_id)) {
                    $job->fulfilled = 1;
                    $job->fulfilled_at = date('Y-m-d H:i:s');
                    $this->request_counter++;
                    $job->save();
                }
            }
        }
    }

    private function loadJobs()
    {
        $jobs = Model::factory('Jobs')->order_by_asc('inserted')->where('fulfilled', 0)->limit(15)->find_many();
        $this->jobs = $jobs;
    }

}

$w = new Worker();
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