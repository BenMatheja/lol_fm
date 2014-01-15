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
                $stats = $game->stats;
                $mapping = json_decode($stats, true);
            if ($mapping != null) {
                    $new_stats = Model::factory('GameStatistic')->create();
                    $new_stats->game_id = $game->id;
                    //begin standard riot v1.3
                    $new_stats->assists =                               $mapping['assists'];
                    $new_stats->barracks_killed =                       $mapping['barracksKilled'];
                    $new_stats->champions_killed =                      $mapping['championsKilled'];
                    $new_stats->combat_player_score =                   $mapping['combatPlayerScore'];
                    $new_stats->consumables_purchased =                 $mapping['consumablesPurchased'];
                    $new_stats->damage_dealt_player =                   $mapping['damageDealtPlayer'];
                    $new_stats->double_kills =                          $mapping['doubleKills'];
                    $new_stats->first_blood =                           $mapping['firstBlood'];
                    $new_stats->gold =                                  $mapping['gold'];
                    $new_stats->gold_earned =                           $mapping['goldEarned'];
                    $new_stats->gold_spent =                            $mapping['goldSpent'];
                    $new_stats->item0 =                                 $mapping['item0'];
                    $new_stats->item1 =                                 $mapping['item1'];
                    $new_stats->item2 =                                 $mapping['item2'];
                    $new_stats->item3 =                                 $mapping['item3'];
                    $new_stats->item4 =                                 $mapping['item4'];
                    $new_stats->item5 =                                 $mapping['item5'];
                    $new_stats->item6 =                                 $mapping['item6'];
                    $new_stats->items_purchased =                       $mapping['itemsPurchased'];
                    $new_stats->killing_sprees =                        $mapping['killingSprees'];
                    $new_stats->largest_critical_strike =               $mapping['largestCriticalStrike'];
                    $new_stats->largest_killing_spree =                 $mapping['largestKillingSpree'];
                    $new_stats->largest_multi_kill =                    $mapping['largestMultiKill'];
                    $new_stats->legendary_items_created =               $mapping['legendaryItemsCreated'];
                    $new_stats->level =                                 $mapping['level'];
                    $new_stats->magic_damage_dealt_player =             $mapping['magicDamageDealtPlayer'];
                    $new_stats->magic_damage_dealt_champions =          $mapping['magicDamageDealtToChampions'];
                    $new_stats->magic_damage_taken =                    $mapping['magicDamageTaken'];
                    $new_stats->minions_denied =                        $mapping['minionsDenied'];
                    $new_stats->minions_killed =                        $mapping['minionsKilled'];
                    $new_stats->neutral_minions_killed =                $mapping['neutralMinionsKilled'];
                    $new_stats->neutral_minions_killed_enemy_jungle =   $mapping['neutralMinionsKilledEnemyJungle'];
                    $new_stats->neutral_minions_killed_your_jungle =    $mapping['neutralMinionsKilledYourJungle'];
                    $new_stats->nexus_killed =                          $mapping['nexusKilled'];
                    $new_stats->node_capture =                          $mapping['nodeCapture'];
                    $new_stats->node_capture_assist =                   $mapping['nodeCaptureAssist'];
                    $new_stats->node_neutralize =                       $mapping['nodeNeutralize'];
                    $new_stats->node_neutralize_assist =                $mapping['nodeNeutralizeAssist'];
                    $new_stats->num_deaths =                            $mapping['numDeaths'];
                    $new_stats->num_items_bought =                      $mapping['numItemsBought'];
                    $new_stats->objective_player_score =                $mapping['objectivePlayerScore'];
                    $new_stats->penta_kills =                           $mapping['pentaKills'];
                    $new_stats->physical_damage_dealt_player =          $mapping['physicalDamageDealtPlayer'];
                    $new_stats->physical_damage_dealt_champions =       $mapping['physicalDamageDealtToChampions'];
                    $new_stats->physical_damage_taken =                 $mapping['physicalDamageTaken'];
                    $new_stats->quadra_kills =                          $mapping['quadraKills'];
                    $new_stats->sight_wards_bought =                    $mapping['sightWardsBought'];
                    $new_stats->spell1_cast =                           $mapping['spell1Cast'];
                    $new_stats->spell2_cast =                           $mapping['spell2Cast'];
                    $new_stats->spell3_cast =                           $mapping['spell3Cast'];
                    $new_stats->spell4_cast =                           $mapping['spell4Cast'];
                    $new_stats->summon_spell1_cast =                    $mapping['summonSpell1Cast'];
                    $new_stats->summon_spell2_cast =                    $mapping['summonSpell2Cast'];
                    $new_stats->super_monster_killed =                  $mapping['superMonsterKilled'];
                    $new_stats->team =                                  $mapping['team'];
                    $new_stats->team_objective =                        $mapping['teamObjective'];
                    $new_stats->time_played =                           $mapping['timePlayed'];
                    $new_stats->total_damage_dealt =                    $mapping['totalDamageDealt'];
                    $new_stats->total_damage_dealt_champions =          $mapping['totalDamageDealtToChampions'];
                    $new_stats->total_damage_taken =                    $mapping['totalDamageTaken'];
                    $new_stats->total_heal =                            $mapping['totalHeal'];
                    $new_stats->total_player_score =                    $mapping['totalPlayerScore'];
                    $new_stats->total_score_rank =                      $mapping['totalScoreRank'];
                    $new_stats->total_time_crowd_control_dealt =        $mapping['totalTimeCrowdControlDealt'];
                    $new_stats->total_units_healed =                    $mapping['totalUnitsHealed'];
                    $new_stats->triple_kills =                          $mapping['tripleKills'];
                    $new_stats->true_damage_dealt_player =              $mapping['trueDamageDealtPlayer'];
                    $new_stats->true_damage_dealt_champions =           $mapping['trueDamageDealtToChampions'];
                    $new_stats->true_damage_taken =                     $mapping['trueDamageTaken'];
                    $new_stats->turrets_killed =                        $mapping['turretsKilled'];
                    $new_stats->unreal_kills =                          $mapping['unrealKills'];
                    $new_stats->victory_point_total =                   $mapping['victoryPointTotal'];
                    $new_stats->vision_wards_bought =                   $mapping['visionWardsBought'];
                    $new_stats->ward_killed =                           $mapping['wardKilled'];
                    $new_stats->ward_placed =                           $mapping['wardPlaced'];
                    $new_stats->win =                                   $mapping['win'];

                    //be compliant to old database
                    $new_stats->save();
                    $game->stats_crunched = 1;
                    $game->save();
                }
            }
        }
    }
}

$cruncher = new CrunchStatistics();
