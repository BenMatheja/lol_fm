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
        $current_timestamp = date('Y-m-d H:i:s');
        $qry = 'INSERT INTO worker(name,requests_refreshed, worker_id) VALUES("' . $name . '","' . $current_timestamp . '","' . $uid . '")';
        mysqli_query($this->link, $qry);
    }

    private function run()
    {
        while ($this->getRunState()) {
            $this->loadJobs();
            var_dump($this->jobs);

        }
    }


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

    private function getRunState()
    {
        $qry = 'SELECT run FROM worker where worker_id="' . $this->uid . '"';
        $result = mysqli_fetch_assoc(mysqli_query($this->link, $qry));
        if ($result['run'] == 1) {
            return true;
        } else
            return false;
    }

    private function loadJobs()
    {
        $qry = 'SELECT * FROM jobs where fulfilled = 0';
        $result = mysqli_query($this->link, $qry);
        while ($row = mysqli_fetch_assoc($result)) {
            $jobs[] = $row;
        }
        $this->jobs = $jobs;
    }

}

$w = new Worker('hell');
// $data = $rp->process($request->performRequest($request->buildRequest('SummonerIdByName', 'dwaynehart')));