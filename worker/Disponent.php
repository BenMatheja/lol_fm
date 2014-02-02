<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 22:22
 */
/**
 * Friendly Job Generator
 */
require_once 'Config/Config.php';
class Disponent
{


    public function __construct($argv)
    {
        $this->arg = $argv;
        $this->autoloadModels();
        $this->run();
    }

    private function autoloadModels()
    {
        $model_array = array_diff(scandir(DIR_BASE . '../models'), array(".", "..", '.gitignore'));
        foreach ($model_array as $model) {
            require_once DIR_BASE . '../models/' . $model;
        }
    }

    public function run()
    {
        if (isset($this->arg[1])) {
            if ($this->arg[1] == 'user') {
                $this->CreateJobsForSummonerProfiles(1);
            }
        } else {
            if ($this->checkForJobsLeft()) {
                $this->CreateJobsForSummonerProfiles(0);
            }
        }
    }

    public function CreateJobsForSummonerProfiles($switch)
    {
        $summoner = Model::Factory('Summoner')->where('is_user', $switch)->find_array();
        $recentgames_service =      ORM::for_table('service')->where('name', 'RecentGames')->find_one();
        $summoner_update_service =  ORM::for_table('service')->where('name', 'SummonerNameById')->find_one();
        $service =                  ORM::for_table('service')->where('name', 'SummonerIdByName')->find_one();

        foreach ($summoner as $sum) {
            $new_job = Model::Factory('Job')->create();
            if ($sum['riot_id'] != null) {
                //create recentgames job with priority
                $new_job->service_id = $recentgames_service->id;
                $new_job->strategy = $recentgames_service->strategy;
                $new_job->param = $sum['riot_id'];
                $new_job->summoner_id = $sum['id'];
                $new_job->priority = $switch;
                $new_job->save();

                //create summoner update job
                $new2_job = Model::Factory('Job')->create();
                $new2_job->service_id = $summoner_update_service->id;
                $new2_job->strategy = $summoner_update_service->strategy;
                $new2_job->param = $sum['riot_id'];
                $new2_job->summoner_id = $sum['id'];
                $new2_job->priority = $switch;
                $new2_job->save();
            }
            //Resolve names to summoner ids
            if ($sum['name'] != null && $sum['riot_id'] == null) {
                $new_job3 = Model::Factory('Job')->create();
                $new_job3->service_id = $service->id;
                $new_job3->strategy = $service->strategy;
                $new_job3->param = $sum['name'];
                $new_job3->summoner_id = $sum['id'];
                $new_job3->priority = $switch;
                $new_job3->save();
            }
        }
    }

    private function checkForJobsLeft(){
        $job = Model::Factory('Job')->where('fulfilled', 0)->find_array();
        if($job != null){
            return false;

        }
        else{
            return true;

        }
    }
}

$dp = new Disponent($argv);
