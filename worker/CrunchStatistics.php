<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 1/13/14
 * Time: 1:36 PM
 */
/**
 * Crunch statistics take statistics out of game and crunches them into a different entity
 *
 */
require_once 'Config/Config.php';
class CrunchStatistics{

    public function __construct(){

        $games = Model::Factory('Games')->where('stats_crunched',0)->find_many();

        foreach ($games as $game){


        }


    }



}