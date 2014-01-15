<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 14/01/14
 * Time: 01:37
 */
require_once 'Config/Config.php';

echo date('Y-m-d H:i:S');
$string = '{"level":16,"goldEarned":13252,"numDeaths":8,"turretsKilled":1,"minionsKilled":146,"championsKilled":9,"goldSpent":8073,"totalDamageDealt":119380,"totalDamageTaken":35030,"doubleKills":3,"killingSprees":3,"largestKillingSpree":4,"team":200,"win":true,"neutralMinionsKilled":24,"largestMultiKill":2,"physicalDamageDealtPlayer":95999,"magicDamageDealtPlayer":22259,"physicalDamageTaken":29022,"magicDamageTaken":5037,"largestCriticalStrike":393,"timePlayed":2091,"totalHeal":3656,"totalUnitsHealed":1,"assists":7,"item0":3078,"item1":3153,"item2":3143,"item3":3047,"item5":1055,"item6":3350,"sightWardsBought":1,"magicDamageDealtToChampions":4764,"physicalDamageDealtToChampions":13983,"totalDamageDealtToChampions":19664,"trueDamageDealtPlayer":1122,"trueDamageDealtToChampions":916,"trueDamageTaken":971,"wardPlaced":5,"neutralMinionsKilledEnemyJungle":6,"neutralMinionsKilledYourJungle":18,"totalTimeCrowdControlDealt":198}';
$mapping = json_decode($string,true);
var_dump($mapping);
if ($mapping != null) {
    $new_stats = array();
    $new_stats->level = $mapping['level'];
    $new_stats->gold_earned = $mapping['goldEarned'];
    $new_stats->num_deaths = $mapping['numDeaths'];
    $new_stats->minions_killed = $mapping['minionsKilled'];
    $new_stats->champions_killed = $mapping['championsKilled'];
    $new_stats->gold_spent = $mapping['goldSpent'];
    $new_stats->total_damage_dealt = $mapping['totalDamageDealt'];
    $new_stats->total_damage_taken = $mapping['totalDamageTaken'];
    $new_stats->double_kills = $mapping['double_kills'];
    $new_stats->killing_sprees = $mapping['killingSprees'];
    $new_stats->largest_killing_spree = $mapping['largestKillingSpree'];
    $new_stats->team = $mapping['team'];
    $new_stats->win = $mapping['win'];
    $new_stats->neutral_minions_killed = $mapping['neutralMinionsKilled'];
    $new_stats->largest_multi_kill = $mapping['largestMultiKill'];
    $new_stats->physical_damage_dealt_player = $mapping['physicalDamageDealtPlayer'];
    $new_stats->magic_damage_dealt_player = $mapping['magicDamageDealtPlayer'];
    $new_stats->physical_damage_taken = $mapping['physicalDamageTaken'];
    $new_stats->magic_damage_taken = $mapping['magicDamageTaken'];
    $new_stats->largest_critical_strike = $mapping['largestCriticalStrike'];
    $new_stats->time_played = $mapping['timePlayed'];
    $new_stats->total_heal = $mapping['totalHeal'];
    $new_stats->total_units_healed = $mapping['totalUnitsHealed'];
    $new_stats->assists = $mapping['assists'];
    //Items
    $new_stats->item0 = $mapping['item0'];
    $new_stats->item1 = $mapping['item1'];
    $new_stats->item2 = $mapping['item2'];
    $new_stats->item3 = $mapping['item3'];
    $new_stats->item4 = $mapping['item4'];
    $new_stats->item5 = $mapping['item5'];
    $new_stats->item6 = $mapping['item6'];
    //new
    $new_stats->sight_wards_bought = $mapping['sightWardsBought'];
    //old
    $new_stats->magic_damage_dealt_champions = $mapping['magicDamageDealtToChampions'];
    $new_stats->physical_damage_dealt_champions = $mapping['physicalDamageDealtToChampions'];
    $new_stats->total_damage_dealt_champions = $mapping['totalDamageDealtToChampions'];
    $new_stats->true_damage_dealt_player = $mapping['trueDamageDealtPlayer'];
    $new_stats->true_damage_dealt_champions = $mapping['trueDamageDealtToChampions'];
    $new_stats->true_damage_taken = $mapping['trueDamageTaken'];
    $new_stats->ward_placed = $mapping['wardPlaced'];
    $new_stats->neutral_minions_killed_enemy_jungle = $mapping['neutralMinionsKilledEnemyJungle'];
    $new_stats->neutral_minions_killed_your_jungle = $mapping['neutralMinionsKilledYourJungle'];
    $new_stats->total_time_crowd_control_dealt = $mapping['totalTimeCrowdControlDealt'];
    //be compliant to old database






}
var_dump($new_stats);