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
class Disponent{

    public function __construct(){
    $this->autoloadModels();
    $this->run();
    }

    private function autoloadModels()
    {
        $model_array = array_diff( scandir(DIR_BASE.'../models'), array(".", "..",'.gitignore') );
        foreach ($model_array as $model) {
            require_once DIR_BASE.'../models/' . $model;
        }
    }

    public function CreateJobsForSummonerProfiles(){
        $summoner = Model::Factory('Summoner')->find_array();
        foreach($summoner as $sum){
            $new_job = Model::Factory('Jobs')->create();
            if($sum['riot_id'] != null){
               //create recentgames job
               $new_job->services_id =  ORM::for_table('services')->where('name','RecentGames')->find_one()->id;
               $new_job->strategy = ORM::for_table('services')->where('name','RecentGames')->find_one()->strategy;
               $new_job->param = $sum['riot_id'];
               $new_job->summoner_id = $sum['id'];
               $new_job->save();
               //create summoner update job
               $new2_job = Model::Factory('Jobs')->create();
               $new2_job->services_id =  ORM::for_table('services')->where('name','SummonerNameById')->find_one()->id;
               $new2_job->strategy = ORM::for_table('services')->where('name','SummonerNameById')->find_one()->strategy;
               $new2_job->param = $sum['riot_id'];
               $new2_job->summoner_id = $sum['id'];
               $new2_job->save();

            }
            if($sum['name'] != null && $sum['riot_id'] == null){
            $new_job = Model::Factory('Jobs')->create();
                $service = ORM::for_table('services')->where('name','SummonerIdByName')->find_one();
                $new_job->services_id = $service->id;
                $new_job->strategy = $service->strategy;
                $new_job->param = $sum['name'];
                $new_job->summoner_id = $sum['id'];
                $new_job->save();
            }
        }
    }


    public function run(){
         $this->CreateJobsForSummonerProfiles();
    }
}

$dp = new Disponent();
