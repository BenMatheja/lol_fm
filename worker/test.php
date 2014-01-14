<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 14/01/14
 * Time: 01:37
 */

$string = '[{"summonerId":21150464,"teamId":200,"championId":44},{"summonerId":31417239,"teamId":100,"championId":53},{"summonerId":38508562,"teamId":200,"championId":133},{"summonerId":21136280,"teamId":200,"championId":5},{"summonerId":38514216,"teamId":100,"championId":119},{"summonerId":29089074,"teamId":100,"championId":238},{"summonerId":20969917,"teamId":200,"championId":24},{"summonerId":26167730,"teamId":200,"championId":45},{"summonerId":30951144,"teamId":100,"championId":86}]';
$array = json_decode($string,true);

/*foreach ($array as $key=>$value){

    $tmp[$value['summonerId']] = $value['championId'];
}*/

var_dump($array);


