<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 1/13/14
 * Time: 11:16 AM
 */
class SummonerStatistics extends Model{

    public function Summoner(){
        $this->belongs_to('Summoner');
    }
}