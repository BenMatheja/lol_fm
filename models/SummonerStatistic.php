<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 1/13/14
 * Time: 11:16 AM
 */
class SummonerStatistic extends Model{

    public function summoner(){
        $this->belongs_to('Summoner');
    }
}