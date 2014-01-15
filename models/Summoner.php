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

    public function statistic()
    {
        return $this->has_one('SummonerStatistic');

    }

    public function user()
    {
        return $this->belongs_to('User');
    }

    public function getChampionsForGame()
    {
        return $this->games()->champion()->find_many();
    }

    public function games()
    {
        return $this->has_many('Game');
    }

    public function getFullGameDetails($id)
    {
        return ORM::for_table('summoner')->raw_query('SELECT *, summoner.id as "summoner_id", game.id as `game_id` from summoner
LEFT JOIN game on summoner.id = game.summoner_id
LEFT join champion on game.champion_id = champion.id
LEFT join game_statistic on game_statistic.game_id = game.id
WHERE summoner.id = :id
ORDER BY game_end_date DESC', array('id' => $id))->find_array();
        /*
         * SELECT * from summoner
LEFT JOIN game on summoner.id = game.summoner_id
LEFT join champion on game.champion_id = champion.id
LEFT join game_statistic on game_statistic.game_id = game.id
WHERE summoner.id = 3
         */
    }
}
