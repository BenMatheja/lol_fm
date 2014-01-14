<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 1/13/14
 * Time: 1:36 PM
 */
/**
 * Crunch statistics take statistics out of game and crunches them into a different entity
 * array (size=38)
'LEVEL' => int 15
'GOLD_EARNED' => int 10966
'NUM_DEATHS' => int 6
'TURRETS_KILLED' => int 2
'MINIONS_KILLED' => int 150
'CHAMPIONS_KILLED' => int 6
'GOLD_SPENT' => int 8705
'TOTAL_DAMAGE_DEALT' => int 96419
'TOTAL_DAMAGE_TAKEN' => int 21191
'KILLING_SPREES' => int 1
'LARGEST_KILLING_SPREE' => int 2
'ITEM5' => int 1036
'LOSE' => int 1
'TEAM' => int 100
'ITEM4' => int 3265
'ITEM1' => int 3074
'ITEM0' => int 1054
'NEUTRAL_MINIONS_KILLED' => int 11
'ITEM3' => int 1037
'PHYSICAL_DAMAGE_DEALT_PLAYER' => int 95853
'ITEM2' => int 3071
'LARGEST_MULTI_KILL' => int 1
'TRUE_DAMAGE_DEALT_PLAYER' => int 566
'MAGIC_DAMAGE_TAKEN' => int 7657
'TRUE_DAMAGE_DEALT_TO_CHAMPIONS' => int 566
'PHYSICAL_DAMAGE_DEALT_TO_CHAMPIONS' => int 14350
'PHYSICAL_DAMAGE_TAKEN' => int 12672
'TOTAL_DAMAGE_DEALT_TO_CHAMPIONS' => int 14916
'ITEM6' => int 3350
'TOTAL_HEAL' => int 42
'NEUTRAL_MINIONS_KILLED_YOUR_JUNGLE' => int 9
'TIME_PLAYED' => int 2167
'TOTAL_TIME_CROWD_CONTROL_DEALT' => int 51
'WARD_PLACED' => int 3
'NEUTRAL_MINIONS_KILLED_ENEMY_JUNGLE' => int 2
'TOTAL_UNITS_HEALED' => int 1
'TRUE_DAMAGE_TAKEN' => int 862
'ASSISTS' => int 6
 */
require_once 'Config/Config.php';
require_once DIR_BASE.'../models/GameStatistic.php';
require_once DIR_BASE.'../models/Game.php';

class CrunchStatistics
{
    public function __construct()
    {
        $games = Model::Factory('Game')->where('stats_crunched', 0)->limit(500)->find_many();
        if ($games) {
            foreach ($games as $game) {
                $stats = $game->statistics;
                $stats = json_decode($stats, true);
                foreach ($stats as $key => $value) {
                    $mapping[$value['name']] = $value['value'];
                }
                if ($mapping != null) {
                    $new_stats = Model::factory('GameStatistic')->create();
                    $new_stats->game_id = $game->id;
                    $new_stats->level = $mapping['LEVEL'];
                    $new_stats->gold_earned = $mapping['GOLD_EARNED'];
                    $new_stats->num_deaths = $mapping['NUM_DEATHS'];
                    $new_stats->minions_killed = $mapping['MINIONS_KILLED'];
                    $new_stats->champions_killed = $mapping['CHAMPIONS_KILLED'];
                    $new_stats->gold_spent = $mapping['GOLD_SPENT'];
                    $new_stats->total_damage_dealt = $mapping['TOTAL_DAMAGE_DEALT'];
                    $new_stats->total_damage_taken = $mapping['TOTAL_DAMAGE_TAKEN'];
                    $new_stats->lose = $mapping['LOSE'];
                    $new_stats->team = $mapping['TEAM'];
                    //Items
                    $new_stats->item0 = $mapping['ITEM0'];
                    $new_stats->item1 = $mapping['ITEM1'];
                    $new_stats->item2 = $mapping['ITEM2'];
                    $new_stats->item3 = $mapping['ITEM3'];
                    $new_stats->item4 = $mapping['ITEM4'];
                    $new_stats->item5 = $mapping['ITEM5'];
                    $new_stats->item6 = $mapping['ITEM6'];

                    $new_stats->largest_multi_kill = $mapping['LARGEST_MULTI_KILL'];
                    $new_stats->neutral_minions_killed = $mapping['NEUTRAL_MINIONS_KILLED'];

                    $new_stats->physical_damage_dealt_player = $mapping['PHYSICAL_DAMAGE_DEALT_PLAYER'];
                    $new_stats->physical_damage_dealt_champions = $mapping['PHYSICAL_DAMAGE_DEALT_TO_CHAMPIONS'];
                    $new_stats->magic_damage_taken = $mapping['MAGIC_DAMAGE_TAKEN'];
                    $new_stats->magic_damage_dealt_player = $mapping['MAGIC_DAMAGE_DEALT_PLAYER'];
                    $new_stats->true_damage_dealt_champions = $mapping['TRUE_DAMAGE_DEALT_TO_CHAMPIONS'];
                    $new_stats->true_damage_dealt_player = $mapping['TRUE_DAMAGE_DEALT_PLAYER'];
                    $new_stats->physical_damage_taken = $mapping['PHYSICAL_DAMAGE_TAKEN'];
                    $new_stats->total_damage_dealt_champions = $mapping['TOTAL_DAMAGE_DEALT_TO_CHAMPIONS'];
                    $new_stats->magic_damage_dealt_champions = $mapping['MAGIC_DAMAGE_DEALT_TO_CHAMPIONS'];

                    $new_stats->total_heal = $mapping['TOTAL_HEAL'];
                    $new_stats->neutral_minions_killed_your_jungle = $mapping['NEUTRAL_MINIONS_KILLED_YOUR_JUNGLE'];
                    $new_stats->time_played = $mapping['TIME_PLAYED'];
                    $new_stats->total_time_crowd_control_dealt = $mapping['TOTAL_TIME_CROWD_CONTROL_DEALT'];
                    $new_stats->ward_placed = $mapping['WARD_PLACED'];
                    $new_stats->neutral_minions_killed_enemy_jungle = $mapping['NEUTRAL_MINIONS_KILLED_ENEMY_JUNGLE'];
                    $new_stats->total_units_healed = $mapping['TOTAL_UNITS_HEALED'];
                    $new_stats->true_damage_taken = $mapping['TRUE_DAMAGE_TAKEN'];
                    $new_stats->assists = $mapping['ASSISTS'];
                    $new_stats->largest_critical_strike = $mapping['LARGEST_CRITICAL_STRIKE'];
                    $new_stats->save();
                    $game->stats_crunched = 1;
                    $game->save();
                }
            }

        }
    }
}

$cruncher = new CrunchStatistics();
