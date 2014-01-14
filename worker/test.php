<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 14/01/14
 * Time: 01:37
 */

$string = '[{"id":1,"name":"LEVEL","value":11},{"id":1003,"name":"TOTAL_PLAYER_SCORE","value":167},{"id":2,"name":"GOLD_EARNED","value":5294},{"id":1002,"name":"TEAM_OBJECTIVE","value":1},{"id":1005,"name":"OBJECTIVE_PLAYER_SCORE","value":167},{"id":23,"name":"WIN","value":1},{"id":1006,"name":"VICTORY_POINT_TOTAL","value":373},{"id":1009,"name":"TOTAL_SCORE_RANK","value":5},{"id":24,"name":"TEAM","value":200},{"id":40,"name":"TIME_PLAYED","value":789},{"id":94,"name":"WAS_AFK","value":1}]';
$array = json_decode($string,true);

foreach ($array as $key=>$value){

    $tmp[$value['name']] = $value['value'];
}

var_dump($tmp);

