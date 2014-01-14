<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 14/01/14
 * Time: 01:37
 */
require_once 'Config/Config.php';

$json = '[{"id":1,"name":"LEVEL","value":15},{"id":2,"name":"GOLD_EARNED","value":10966},{"id":4,"name":"NUM_DEATHS","value":6},{"id":6,"name":"TURRETS_KILLED","value":2},{"id":7,"name":"MINIONS_KILLED","value":150},{"id":8,"name":"CHAMPIONS_KILLED","value":6},{"id":9,"name":"GOLD_SPENT","value":8705},{"id":10,"name":"TOTAL_DAMAGE_DEALT","value":96419},{"id":11,"name":"TOTAL_DAMAGE_TAKEN","value":21191},{"id":20,"name":"KILLING_SPREES","value":1},{"id":22,"name":"LARGEST_KILLING_SPREE","value":2},{"id":93,"name":"ITEM5","value":1036},{"id":25,"name":"LOSE","value":1},{"id":24,"name":"TEAM","value":100},{"id":92,"name":"ITEM4","value":3265},{"id":89,"name":"ITEM1","value":3074},{"id":88,"name":"ITEM0","value":1054},{"id":28,"name":"NEUTRAL_MINIONS_KILLED","value":11},{"id":91,"name":"ITEM3","value":1037},{"id":31,"name":"PHYSICAL_DAMAGE_DEALT_PLAYER","value":95853},{"id":90,"name":"ITEM2","value":3071},{"id":30,"name":"LARGEST_MULTI_KILL","value":1},{"id":102,"name":"TRUE_DAMAGE_DEALT_PLAYER","value":566},{"id":34,"name":"MAGIC_DAMAGE_TAKEN","value":7657},{"id":103,"name":"TRUE_DAMAGE_DEALT_TO_CHAMPIONS","value":566},{"id":100,"name":"PHYSICAL_DAMAGE_DEALT_TO_CHAMPIONS","value":14350},{"id":33,"name":"PHYSICAL_DAMAGE_TAKEN","value":12672},{"id":101,"name":"TOTAL_DAMAGE_DEALT_TO_CHAMPIONS","value":14916},{"id":110,"name":"ITEM6","value":3350},{"id":43,"name":"TOTAL_HEAL","value":42},{"id":108,"name":"NEUTRAL_MINIONS_KILLED_YOUR_JUNGLE","value":9},{"id":40,"name":"TIME_PLAYED","value":2167},{"id":109,"name":"TOTAL_TIME_CROWD_CONTROL_DEALT","value":51},{"id":106,"name":"WARD_PLACED","value":3},{"id":107,"name":"NEUTRAL_MINIONS_KILLED_ENEMY_JUNGLE","value":2},{"id":44,"name":"TOTAL_UNITS_HEALED","value":1},{"id":104,"name":"TRUE_DAMAGE_TAKEN","value":862},{"id":48,"name":"ASSISTS","value":6}]';
$stats = json_decode($json, true);
foreach ($stats as $key => $value) {
    $mapping[$value['name']] = $value['value'];
}

var_dump($mapping);




