<?php
require_once 'config/Config.php';
require_once '../models/Summoner.php';
class ResponseProcessor{
	
	public function __construct(){

	}
    /*
     * decode the json response to associative array
     */
	public function process($response){
	$decoded = json_decode($response,TRUE);
	return $decoded;
	}

    public function persistResponse(){

    }
/*array (size=6)
'id' => int 19646272
'name' => string 'DwayneHart' (length=10)
'profileIconId' => int 563
'summonerLevel' => int 30
'revisionDate' => float 1389476015000
'revisionDateStr' => string '01/11/2014 09:33 PM UTC' (length=23)*/
    public function processSummonerIdCall($response, $id){
        $decoded = $this->process($response);
        $summoner = Model::factory('Summoner')->where('id', $id)->find_one();
        $summoner->name = $decoded['name'];
        $summoner->summoner_level = $decoded['summonerLevel'];
        $summoner->profile_icon_id = $decoded['profileIconId'];
        $summoner->riot_id = $decoded['id'];
        $summoner->save();
        return true;
    }

    public function processGamesForSummonerCall($response,$id){

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

