<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 14/01/14
 * Time: 01:37
 */
require_once 'Config/Config.php';

echo date('Y-m-d H:i:S');


$json = '[{"id":1,"name":"LEVEL","value":18},{"id":2,"name":"GOLD_EARNED","value":14646},{"id":4,"name":"NUM_DEATHS","value":5},{"id":7,"name":"MINIONS_KILLED","value":30},{"id":8,"name":"CHAMPIONS_KILLED","value":11},{"id":9,"name":"GOLD_SPENT","value":7525},{"id":10,"name":"TOTAL_DAMAGE_DEALT","value":62213},{"id":11,"name":"TOTAL_DAMAGE_TAKEN","value":21527},{"id":16,"name":"DOUBLE_KILLS","value":1},{"id":20,"name":"KILLING_SPREES","value":4},{"id":23,"name":"WIN","value":1},{"id":22,"name":"LARGEST_KILLING_SPREE","value":3},{"id":93,"name":"ITEM5","value":3174},{"id":24,"name":"TEAM","value":200},{"id":92,"name":"ITEM4","value":3108},{"id":89,"name":"ITEM1","value":3001},{"id":88,"name":"ITEM0","value":3020},{"id":91,"name":"ITEM3","value":3089},{"id":31,"name":"PHYSICAL_DAMAGE_DEALT_PLAYER","value":11483},{"id":90,"name":"ITEM2","value":3096},{"id":30,"name":"LARGEST_MULTI_KILL","value":2},{"id":34,"name":"MAGIC_DAMAGE_TAKEN","value":16656},{"id":100,"name":"PHYSICAL_DAMAGE_DEALT_TO_CHAMPIONS","value":1486},{"id":32,"name":"MAGIC_DAMAGE_DEALT_PLAYER","value":50729},{"id":101,"name":"TOTAL_DAMAGE_DEALT_TO_CHAMPIONS","value":37316},{"id":33,"name":"PHYSICAL_DAMAGE_TAKEN","value":4870},{"id":99,"name":"MAGIC_DAMAGE_DEALT_TO_CHAMPIONS","value":35830},{"id":110,"name":"ITEM6","value":2052},{"id":43,"name":"TOTAL_HEAL","value":3585},{"id":40,"name":"TIME_PLAYED","value":1591},{"id":109,"name":"TOTAL_TIME_CROWD_CONTROL_DEALT","value":287},{"id":44,"name":"TOTAL_UNITS_HEALED","value":1},{"id":48,"name":"ASSISTS","value":39}]';
$dec = json_decode($json,true);
var_dump($dec);