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

    public function __construct()
    {
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
        $this->CreateJobsForSummonerProfiles();
    }

    public function CreateJobsForSummonerProfiles()
    {
        $summoner = Model::Factory('Summoner')->find_array();
        foreach ($summoner as $sum) {
            $new_job = Model::Factory('Job')->create();
            if ($sum['riot_id'] != null) {
                //only create jobs for summoners who are users $sum['is_user'] == 1 ->where('is_user',1)
                if ($sum['is_user'] == 1) {
                    //create recentgames job
                    $new_job->service_id = ORM::for_table('service')->where('name', 'RecentGames')->find_one()->id;
                    $new_job->strategy = ORM::for_table('service')->where('name', 'RecentGames')->find_one()->strategy;
                    $new_job->param = $sum['riot_id'];
                    $new_job->summoner_id = $sum['id'];
                    $new_job->save();
                }
                //create summoner update job
                $new2_job = Model::Factory('Job')->create();
                $new2_job->service_id = ORM::for_table('service')->where('name', 'SummonerNameById')->find_one()->id;
                $new2_job->strategy = ORM::for_table('service')->where('name', 'SummonerNameById')->find_one()->strategy;
                $new2_job->param = $sum['riot_id'];
                $new2_job->summoner_id = $sum['id'];
                $new2_job->save();


            }
            //Resolve names to summoner ids
            if ($sum['name'] != null && $sum['riot_id'] == null) {
                $new_job = Model::Factory('Job')->create();
                $service = ORM::for_table('service')->where('name', 'SummonerIdByName')->find_one();
                $new_job->service_id = $service->id;
                $new_job->strategy = $service->strategy;
                $new_job->param = $sum['name'];
                $new_job->summoner_id = $sum['id'];
                $new_job->save();
            }
        }
    }
}

$dp = new Disponent();
