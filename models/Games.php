<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 18:33
 */
class Games extends Model{
    /*
     public $id;
     public $summoner_id;
     public $riot_id;
     public $game_mode;
     public $sub_type;
     public $map_id;
     public $team_id;
     public $champion_id;
     public $spell_1;
     public $spell_2;
     public $fellow_players;
     public $statistics;
     */
    public function summoner(){
        return $this->belongs_to('Summoner');
    }

    public function statistics(){
        return $this->has_one('GameStatistics');
    }

    public function champions(){
        return $this->has_many('Champions');
    }
 }