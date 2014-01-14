<?php

/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 18:24
 */
class Summoner extends Model
{
    /*

    public $id;
    public $riot_id;
    public $name;
    public $profile_icon_id;
    public $summoner_level;
     */

    public function game()
    {
        return $this->has_many('Game');
    }

   public function statistic(){
       return $this->has_one('SummonerStatistic');

   }

    public function user(){
        return $this->belongs_to('User');
    }
}
