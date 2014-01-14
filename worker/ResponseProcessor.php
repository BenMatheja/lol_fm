<?php
require_once 'Config/Config.php';

class ResponseProcessor
{

    public function __construct()
    {
        $this->autoloadModels();

    }

    private function autoloadModels()
    {
        $model_array = array_diff(scandir(DIR_BASE.'../models'), array(".", "..", '.gitignore'));
        foreach ($model_array as $model) {
            require_once DIR_BASE.'../models/' . $model;
        }
    }

    /*
     * decode the json response to associative array
     */

    public function persistResponse()
    {

    }

    public function processSummonerIdCall($response, $id)
    {
        $decoded = $this->process($response);
        if ($decoded != null) {
            $summoner = Model::factory('Summoner')->where('id', $id)->find_one();
            $summoner->name = $decoded['name'];
            $summoner->summoner_level = $decoded['summonerLevel'];
            $summoner->profile_icon_id = $decoded['profileIconId'];
            $summoner->riot_id = $decoded['id'];
            $summoner->save();
            return true;
        } else return false;
    }

    /*array (size=6)
    'id' => int 19646272
    'name' => string 'DwayneHart' (length=10)
    'profileIconId' => int 563
    'summonerLevel' => int 30
    'revisionDate' => float 1389476015000
    'revisionDateStr' => string '01/11/2014 09:33 PM UTC' (length=23)*/

    public function process($response)
    {
        $decoded = json_decode($response, TRUE);
        return $decoded;
    }

    public function processGamesForSummonerCall($response, $id)
    {
        echo $id;
        $decoded = $this->process($response);
        if ($decoded != null) {
            foreach ($decoded['games'] as $game) {
                $lookup = Model::factory('Game')->where('summoner_id', $id)->where('riot_id', $game['gameId'])->find_one();
                if (!$lookup) {
                    $new_game = Model::factory('Game')->create();
                    $new_game->riot_id = $game['gameId'];
                    $new_game->game_mode = $game['gameMode'];
                    $new_game->sub_type = $game['subType'];
                    $new_game->map_id = $game['mapId'];
                    $new_game->team_id = $game['teamId'];
                    $new_game->champion_id = $game['championId'];
                    $new_game->spell_1 = $game['spell1'];
                    $new_game->spell_2 = $game['spell2'];
                    $new_game->game_end_date = $this->transformEpoch($game['createDate']);
                    $new_game->fellow_players = json_encode($game['fellowPlayers']);
                    $new_game->statistics = json_encode($game['statistics']);
                    $new_game->summoner_id = $id;
                    $new_game->save();
                }
            }
            return true;
        } else return false;

    }

    private function transformEpoch($input)
    {
        $seconds = $input / 1000;
        return date("Y-m-d H:i:s", $seconds);
    }

    public function processChampions($response)
    {
        $old_champ = Model::factory('Champion')->delete_many();
        $decoded = $this->process($response);
        foreach ($decoded['champions'] as $champion) {
            $new_champ = Model::factory('Champion')->create();
            $new_champ->id = $champion['id'];
            $new_champ->defense_rank = $champion['defenseRank'];
            $new_champ->attack_rank = $champion['attackRank'];
            $new_champ->ranked_play_enabled = $champion['rankedPlayEnabled'];
            $new_champ->name = $champion['name'];
            $new_champ->bot_enabled = $champion['botEnabled'];
            $new_champ->difficulty_rank = $champion['difficultyRank'];
            $new_champ->active = $champion['active'];
            $new_champ->free_to_play = $champion['freeToPlay'];
            $new_champ->magic_rank = $champion['magicRank'];
            $new_champ->save();
        }
        return true;

    }

    public function processSummonerNameCall($response, $id){
        $decoded = $this->process($response);
        if ($decoded != null) {
            $summoner = Model::factory('Summoner')->where('id', $id)->find_one();
            $summoner->name = $decoded['name'];
            $summoner->summoner_level = $decoded['summonerLevel'];
            $summoner->profile_icon_id = $decoded['profileIconId'];
            $summoner->riot_id = $decoded['id'];
            $summoner->save();
            return true;
        } else return false;


    }
}
/*
 * here are a few ways you can grab a copy of the summoner icons:

1. Download https://hostr.co/aA5FJ7qhVuXF (a zip package containing all current icons);
2. Scrape `http://ddragon.leagueoflegends.com/cdn/{version}/img/profileicon/{icon_id}.png`, replacing {icon_id} with your icon id(s);
3. Download `http://ddragon.leagueoflegends.com/cdn/dragontail-{version}.tgz` and use the icons located at `/./{version}/img/profileicon/{icon_id}.png`; or,
4. Extract the icons directly from the League of Legends client

# About version strings #
Above, {version} refers to the current ddragon version, which is published at `http://ddragon.leagueoflegends.com/realms/na.json`. As of 2013-12-12, it is `3.14.41`.

The current version string can be found by reading the value at "v" for the general ddragon version or "n.profileicon" for profile icons. These two values have been in sync for several months, but that may change in the future.
 */

