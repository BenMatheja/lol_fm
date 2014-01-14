<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 14/01/14
 * Time: 02:19
 */
require_once 'Config/Config.php';
require_once DIR_BASE.'../models/GameStatistic.php';
require_once DIR_BASE.'../models/Game.php';
require_once DIR_BASE.'../models/GamePlayer.php';
require_once DIR_BASE.'../models/Summoner.php';

class CrunchPlayers
{
    public function __construct()
    {
        $games = Model::Factory('Game')->where('players_crunched', 0)->limit(1500)->find_many();
        if ($games) {
            foreach ($games as $game) {
                $players = $game->fellow_players;
                $players = json_decode($players, true);
                foreach ($players as $element) {
                    $new_game_players = Model::factory('GamePlayer')->create();
                    $new_game_players->riot_summoner_id = $element['summonerId'];
                    $new_game_players->team_id = $element['teamId'];
                    $new_game_players->champions_id = $element['championId'];
                    $new_game_players->games_id = $game->id;
                    $new_game_players->save();
                    $game->players_crunched = 1;
                    $game->save();
                    //if not exists
                    if(!Model::factory('Summoner')->where('riot_id',$element['summonerId'])->find_one()){
                        $new_summoner = Model::factory('Summoner')->create();
                        $new_summoner->riot_id = $element['summonerId'];
                        $new_summoner->is_user = 0;
                        $new_summoner->save();
                    }
                }
            }
        }
    }
}
$cruncher = new CrunchPlayers();
