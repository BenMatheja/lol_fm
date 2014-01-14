<?php
require_once 'Config/Config.php';
require_once '../models/Champions.php';
require_once '../models/ChampionCategories.php';
require_once '../models/ChampionsCategoriesRelation.php';


/**
 * Created by PhpStorm.
 * User: ben
 * Date: 12/01/14
 * Time: 15:08
 */
/*
$response_string = '{"summonerId":23107213,"games":[{"gameId":1209524834,"invalid":false,"gameMode":"CLASSIC","gameType":"MATCHED_GAME","subType":"NORMAL","mapId":1,"teamId":200,"championId":121,"spell1":4,"spell2":14,"level":30,"createDate":1386631953605,"createDateStr":1386631953605,"fellowPlayers":[{"summonerId":29220594,"teamId":100,"championId":44},{"summonerId":27622069,"teamId":100,"championId":38},{"summonerId":27788341,"teamId":200,"championId":131},{"summonerId":42900177,"teamId":100,"championId":15},{"summonerId":22340562,"teamId":200,"championId":64},{"summonerId":39596396,"teamId":200,"championId":222},{"summonerId":20595799,"teamId":200,"championId":98},{"summonerId":19924489,"teamId":100,"championId":92},{"summonerId":19308614,"teamId":100,"championId":102}],"statistics":[{"id":1,"name":"LEVEL","value":15},{"id":2,"name":"GOLD_EARNED","value":9015},{"id":4,"name":"NUM_DEATHS","value":6},{"id":7,"name":"MINIONS_KILLED","value":158},{"id":8,"name":"CHAMPIONS_KILLED","value":3},{"id":9,"name":"GOLD_SPENT","value":5670},{"id":10,"name":"TOTAL_DAMAGE_DEALT","value":96453},{"id":11,"name":"TOTAL_DAMAGE_TAKEN","value":22750},{"id":93,"name":"ITEM5","value":3004},{"id":25,"name":"LOSE","value":1},{"id":24,"name":"TEAM","value":200},{"id":92,"name":"ITEM4","value":1055},{"id":89,"name":"ITEM1","value":1054},{"id":28,"name":"NEUTRAL_MINIONS_KILLED","value":3},{"id":88,"name":"ITEM0","value":3153},{"id":91,"name":"ITEM3","value":1055},{"id":31,"name":"PHYSICAL_DAMAGE_DEALT_PLAYER","value":94023},{"id":30,"name":"LARGEST_MULTI_KILL","value":1},{"id":90,"name":"ITEM2","value":3260},{"id":102,"name":"TRUE_DAMAGE_DEALT_PLAYER","value":900},{"id":34,"name":"MAGIC_DAMAGE_TAKEN","value":8017},{"id":103,"name":"TRUE_DAMAGE_DEALT_TO_CHAMPIONS","value":900},{"id":32,"name":"MAGIC_DAMAGE_DEALT_PLAYER","value":1529},{"id":100,"name":"PHYSICAL_DAMAGE_DEALT_TO_CHAMPIONS","value":13281},{"id":101,"name":"TOTAL_DAMAGE_DEALT_TO_CHAMPIONS","value":15711},{"id":33,"name":"PHYSICAL_DAMAGE_TAKEN","value":14317},{"id":39,"name":"LARGEST_CRITICAL_STRIKE","value":273},{"id":99,"name":"MAGIC_DAMAGE_DEALT_TO_CHAMPIONS","value":1529},{"id":110,"name":"ITEM6","value":3350},{"id":43,"name":"TOTAL_HEAL","value":2219},{"id":108,"name":"NEUTRAL_MINIONS_KILLED_YOUR_JUNGLE","value":3},{"id":40,"name":"TIME_PLAYED","value":1832},{"id":109,"name":"TOTAL_TIME_CROWD_CONTROL_DEALT","value":250},{"id":106,"name":"WARD_PLACED","value":6},{"id":104,"name":"TRUE_DAMAGE_TAKEN","value":414},{"id":44,"name":"TOTAL_UNITS_HEALED","value":1},{"id":48,"name":"ASSISTS","value":7}]},{"gameId":1208283537,"invalid":false,"gameMode":"ARAM","gameType":"MATCHED_GAME","subType":"ARAM_UNRANKED_5x5","mapId":12,"teamId":200,"championId":1,"spell1":4,"spell2":21,"level":30,"createDate":1386560920048,"createDateStr":1386560920048,"fellowPlayers":[{"summonerId":45815380,"teamId":200,"championId":62},{"summonerId":24442659,"teamId":100,"championId":38},{"summonerId":20553996,"teamId":200,"championId":21},{"summonerId":30407306,"teamId":200,"championId":4},{"summonerId":19646272,"teamId":200,"championId":134},{"summonerId":27702764,"teamId":100,"championId":22},{"summonerId":28868167,"teamId":100,"championId":56},{"summonerId":32569143,"teamId":100,"championId":127},{"summonerId":30737483,"teamId":100,"championId":143}],"statistics":[{"id":1,"name":"LEVEL","value":18},{"id":2,"name":"GOLD_EARNED","value":15855},{"id":4,"name":"NUM_DEATHS","value":9},{"id":7,"name":"MINIONS_KILLED","value":45},{"id":8,"name":"CHAMPIONS_KILLED","value":16},{"id":9,"name":"GOLD_SPENT","value":11265},{"id":10,"name":"TOTAL_DAMAGE_DEALT","value":82310},{"id":11,"name":"TOTAL_DAMAGE_TAKEN","value":33168},{"id":17,"name":"TRIPLE_KILLS","value":1},{"id":16,"name":"DOUBLE_KILLS","value":2},{"id":20,"name":"KILLING_SPREES","value":5},{"id":23,"name":"WIN","value":1},{"id":22,"name":"LARGEST_KILLING_SPREE","value":3},{"id":24,"name":"TEAM","value":200},{"id":92,"name":"ITEM4","value":3020},{"id":89,"name":"ITEM1","value":3128},{"id":88,"name":"ITEM0","value":3157},{"id":91,"name":"ITEM3","value":3027},{"id":31,"name":"PHYSICAL_DAMAGE_DEALT_PLAYER","value":8092},{"id":30,"name":"LARGEST_MULTI_KILL","value":3},{"id":90,"name":"ITEM2","value":3089},{"id":34,"name":"MAGIC_DAMAGE_TAKEN","value":20546},{"id":100,"name":"PHYSICAL_DAMAGE_DEALT_TO_CHAMPIONS","value":1493},{"id":32,"name":"MAGIC_DAMAGE_DEALT_PLAYER","value":74218},{"id":101,"name":"TOTAL_DAMAGE_DEALT_TO_CHAMPIONS","value":39639},{"id":33,"name":"PHYSICAL_DAMAGE_TAKEN","value":11492},{"id":99,"name":"MAGIC_DAMAGE_DEALT_TO_CHAMPIONS","value":38146},{"id":43,"name":"TOTAL_HEAL","value":3843},{"id":40,"name":"TIME_PLAYED","value":2077},{"id":109,"name":"TOTAL_TIME_CROWD_CONTROL_DEALT","value":413},{"id":104,"name":"TRUE_DAMAGE_TAKEN","value":1130},{"id":44,"name":"TOTAL_UNITS_HEALED","value":1},{"id":48,"name":"ASSISTS","value":21}]},{"gameId":1213493602,"invalid":false,"gameMode":"ARAM","gameType":"MATCHED_GAME","subType":"ARAM_UNRANKED_5x5","mapId":12,"teamId":100,"championId":90,"spell1":4,"spell2":14,"level":30,"createDate":1386895151793,"createDateStr":1386895151793,"fellowPlayers":[{"summonerId":26214816,"teamId":200,"championId":114},{"summonerId":20827379,"teamId":100,"championId":11},{"summonerId":36039422,"teamId":100,"championId":22},{"summonerId":43115688,"teamId":200,"championId":267},{"summonerId":22340562,"teamId":100,"championId":7},{"summonerId":19646272,"teamId":100,"championId":39},{"summonerId":20018588,"teamId":200,"championId":45},{"summonerId":21534929,"teamId":200,"championId":14},{"summonerId":209419,"teamId":200,"championId":105}],"statistics":[{"id":1,"name":"LEVEL","value":16},{"id":2,"name":"GOLD_EARNED","value":9736},{"id":4,"name":"NUM_DEATHS","value":2},{"id":7,"name":"MINIONS_KILLED","value":22},{"id":8,"name":"CHAMPIONS_KILLED","value":11},{"id":9,"name":"GOLD_SPENT","value":4080},{"id":10,"name":"TOTAL_DAMAGE_DEALT","value":43691},{"id":11,"name":"TOTAL_DAMAGE_TAKEN","value":10313},{"id":16,"name":"DOUBLE_KILLS","value":1},{"id":20,"name":"KILLING_SPREES","value":3},{"id":23,"name":"WIN","value":1},{"id":22,"name":"LARGEST_KILLING_SPREE","value":4},{"id":93,"name":"ITEM5","value":1033},{"id":24,"name":"TEAM","value":100},{"id":92,"name":"ITEM4","value":1004},{"id":89,"name":"ITEM1","value":3089},{"id":88,"name":"ITEM0","value":3027},{"id":31,"name":"PHYSICAL_DAMAGE_DEALT_PLAYER","value":12461},{"id":91,"name":"ITEM3","value":1004},{"id":30,"name":"LARGEST_MULTI_KILL","value":2},{"id":90,"name":"ITEM2","value":3020},{"id":102,"name":"TRUE_DAMAGE_DEALT_PLAYER","value":290},{"id":34,"name":"MAGIC_DAMAGE_TAKEN","value":7361},{"id":103,"name":"TRUE_DAMAGE_DEALT_TO_CHAMPIONS","value":290},{"id":32,"name":"MAGIC_DAMAGE_DEALT_PLAYER","value":30940},{"id":100,"name":"PHYSICAL_DAMAGE_DEALT_TO_CHAMPIONS","value":5331},{"id":33,"name":"PHYSICAL_DAMAGE_TAKEN","value":2677},{"id":101,"name":"TOTAL_DAMAGE_DEALT_TO_CHAMPIONS","value":24916},{"id":99,"name":"MAGIC_DAMAGE_DEALT_TO_CHAMPIONS","value":19294},{"id":43,"name":"TOTAL_HEAL","value":1871},{"id":40,"name":"TIME_PLAYED","value":978},{"id":109,"name":"TOTAL_TIME_CROWD_CONTROL_DEALT","value":117},{"id":44,"name":"TOTAL_UNITS_HEALED","value":1},{"id":104,"name":"TRUE_DAMAGE_TAKEN","value":275},{"id":48,"name":"ASSISTS","value":27}]},{"gameId":1209590511,"invalid":false,"gameMode":"ARAM","gameType":"MATCHED_GAME","subType":"ARAM_UNRANKED_5x5","mapId":12,"teamId":100,"championId":64,"spell1":4,"spell2":21,"level":30,"createDate":1386634191032,"createDateStr":1386634191032,"fellowPlayers":[{"summonerId":23288434,"teamId":200,"championId":119},{"summonerId":27977341,"teamId":200,"championId":134},{"summonerId":19938120,"teamId":200,"championId":107},{"summonerId":22340562,"teamId":100,"championId":154},{"summonerId":20595799,"teamId":100,"championId":53},{"summonerId":19791099,"teamId":100,"championId":41},{"summonerId":23374896,"teamId":100,"championId":58},{"summonerId":33932553,"teamId":200,"championId":29},{"summonerId":43927034,"teamId":200,"championId":31}],"statistics":[{"id":1,"name":"LEVEL","value":18},{"id":2,"name":"GOLD_EARNED","value":15442},{"id":4,"name":"NUM_DEATHS","value":17},{"id":6,"name":"TURRETS_KILLED","value":1},{"id":7,"name":"MINIONS_KILLED","value":66},{"id":8,"name":"CHAMPIONS_KILLED","value":13},{"id":9,"name":"GOLD_SPENT","value":13505},{"id":10,"name":"TOTAL_DAMAGE_DEALT","value":91297},{"id":11,"name":"TOTAL_DAMAGE_TAKEN","value":45017},{"id":16,"name":"DOUBLE_KILLS","value":2},{"id":20,"name":"KILLING_SPREES","value":4},{"id":22,"name":"LARGEST_KILLING_SPREE","value":3},{"id":93,"name":"ITEM5","value":3112},{"id":25,"name":"LOSE","value":1},{"id":24,"name":"TEAM","value":100},{"id":92,"name":"ITEM4","value":3075},{"id":89,"name":"ITEM1","value":3143},{"id":88,"name":"ITEM0","value":3074},{"id":91,"name":"ITEM3","value":3035},{"id":31,"name":"PHYSICAL_DAMAGE_DEALT_PLAYER","value":69461},{"id":30,"name":"LARGEST_MULTI_KILL","value":2},{"id":90,"name":"ITEM2","value":3267},{"id":34,"name":"MAGIC_DAMAGE_TAKEN","value":16213},{"id":32,"name":"MAGIC_DAMAGE_DEALT_PLAYER","value":21835},{"id":100,"name":"PHYSICAL_DAMAGE_DEALT_TO_CHAMPIONS","value":28744},{"id":101,"name":"TOTAL_DAMAGE_DEALT_TO_CHAMPIONS","value":39161},{"id":33,"name":"PHYSICAL_DAMAGE_TAKEN","value":25271},{"id":39,"name":"LARGEST_CRITICAL_STRIKE","value":482},{"id":99,"name":"MAGIC_DAMAGE_DEALT_TO_CHAMPIONS","value":10417},{"id":43,"name":"TOTAL_HEAL","value":2138},{"id":40,"name":"TIME_PLAYED","value":1853},{"id":109,"name":"TOTAL_TIME_CROWD_CONTROL_DEALT","value":633},{"id":104,"name":"TRUE_DAMAGE_TAKEN","value":3532},{"id":44,"name":"TOTAL_UNITS_HEALED","value":1},{"id":48,"name":"ASSISTS","value":28}]},{"gameId":1213436197,"invalid":false,"gameMode":"CLASSIC","gameType":"MATCHED_GAME","subType":"NORMAL","mapId":1,"teamId":100,"championId":98,"spell1":4,"spell2":12,"level":30,"createDate":1386891175288,"createDateStr":1386891175288,"fellowPlayers":[{"summonerId":19228883,"teamId":200,"championId":33},{"summonerId":25818306,"teamId":200,"championId":15},{"summonerId":29373792,"teamId":100,"championId":222},{"summonerId":22340562,"teamId":100,"championId":64},{"summonerId":19646272,"teamId":100,"championId":238},{"summonerId":29243862,"teamId":100,"championId":37},{"summonerId":148230,"teamId":200,"championId":143},{"summonerId":31853622,"teamId":200,"championId":4},{"summonerId":20069676,"teamId":200,"championId":23}],"statistics":[{"id":1,"name":"LEVEL","value":16},{"id":2,"name":"GOLD_EARNED","value":10380},{"id":4,"name":"NUM_DEATHS","value":9},{"id":6,"name":"TURRETS_KILLED","value":2},{"id":7,"name":"MINIONS_KILLED","value":151},{"id":8,"name":"CHAMPIONS_KILLED","value":2},{"id":9,"name":"GOLD_SPENT","value":8040},{"id":10,"name":"TOTAL_DAMAGE_DEALT","value":88830},{"id":11,"name":"TOTAL_DAMAGE_TAKEN","value":30767},{"id":25,"name":"LOSE","value":1},{"id":24,"name":"TEAM","value":100},{"id":92,"name":"ITEM4","value":3065},{"id":89,"name":"ITEM1","value":3068},{"id":28,"name":"NEUTRAL_MINIONS_KILLED","value":5},{"id":88,"name":"ITEM0","value":3143},{"id":31,"name":"PHYSICAL_DAMAGE_DEALT_PLAYER","value":42212},{"id":91,"name":"ITEM3","value":1054},{"id":30,"name":"LARGEST_MULTI_KILL","value":1},{"id":90,"name":"ITEM2","value":3047},{"id":34,"name":"MAGIC_DAMAGE_TAKEN","value":5766},{"id":32,"name":"MAGIC_DAMAGE_DEALT_PLAYER","value":46617},{"id":100,"name":"PHYSICAL_DAMAGE_DEALT_TO_CHAMPIONS","value":4543},{"id":33,"name":"PHYSICAL_DAMAGE_TAKEN","value":22416},{"id":101,"name":"TOTAL_DAMAGE_DEALT_TO_CHAMPIONS","value":12761},{"id":39,"name":"LARGEST_CRITICAL_STRIKE","value":236},{"id":99,"name":"MAGIC_DAMAGE_DEALT_TO_CHAMPIONS","value":8218},{"id":110,"name":"ITEM6","value":3350},{"id":43,"name":"TOTAL_HEAL","value":78},{"id":108,"name":"NEUTRAL_MINIONS_KILLED_YOUR_JUNGLE","value":5},{"id":40,"name":"TIME_PLAYED","value":2117},{"id":109,"name":"TOTAL_TIME_CROWD_CONTROL_DEALT","value":392},{"id":106,"name":"WARD_PLACED","value":8},{"id":44,"name":"TOTAL_UNITS_HEALED","value":1},{"id":104,"name":"TRUE_DAMAGE_TAKEN","value":2584},{"id":48,"name":"ASSISTS","value":10}]},{"gameId":1213508215,"invalid":false,"gameMode":"ARAM","gameType":"MATCHED_GAME","subType":"ARAM_UNRANKED_5x5","mapId":12,"teamId":200,"championId":29,"spell1":14,"spell2":4,"level":30,"createDate":1386899551642,"createDateStr":1386899551642,"fellowPlayers":[{"summonerId":316660,"teamId":200,"championId":126},{"summonerId":19646272,"teamId":200,"championId":154},{"summonerId":19324343,"teamId":100,"championId":120},{"summonerId":37606993,"teamId":100,"championId":85},{"summonerId":19983220,"teamId":100,"championId":51},{"summonerId":43641923,"teamId":100,"championId":37},{"summonerId":27891016,"teamId":100,"championId":63},{"summonerId":22463351,"teamId":200,"championId":222},{"summonerId":30050102,"teamId":200,"championId":74}],"statistics":[{"id":1,"name":"LEVEL","value":10},{"id":2,"name":"GOLD_EARNED","value":6373},{"id":4,"name":"NUM_DEATHS","value":2},{"id":7,"name":"MINIONS_KILLED","value":30},{"id":8,"name":"CHAMPIONS_KILLED","value":3},{"id":9,"name":"GOLD_SPENT","value":4590},{"id":10,"name":"TOTAL_DAMAGE_DEALT","value":18431},{"id":11,"name":"TOTAL_DAMAGE_TAKEN","value":5902},{"id":23,"name":"WIN","value":1},{"id":93,"name":"ITEM5","value":1018},{"id":24,"name":"TEAM","value":200},{"id":92,"name":"ITEM4","value":1037},{"id":89,"name":"ITEM1","value":1055},{"id":88,"name":"ITEM0","value":3035},{"id":91,"name":"ITEM3","value":3006},{"id":31,"name":"PHYSICAL_DAMAGE_DEALT_PLAYER","value":16897},{"id":30,"name":"LARGEST_MULTI_KILL","value":1},{"id":90,"name":"ITEM2","value":1055},{"id":102,"name":"TRUE_DAMAGE_DEALT_PLAYER","value":1533},{"id":34,"name":"MAGIC_DAMAGE_TAKEN","value":3895},{"id":103,"name":"TRUE_DAMAGE_DEALT_TO_CHAMPIONS","value":1259},{"id":100,"name":"PHYSICAL_DAMAGE_DEALT_TO_CHAMPIONS","value":4564},{"id":33,"name":"PHYSICAL_DAMAGE_TAKEN","value":2007},{"id":101,"name":"TOTAL_DAMAGE_DEALT_TO_CHAMPIONS","value":5824},{"id":39,"name":"LARGEST_CRITICAL_STRIKE","value":293},{"id":43,"name":"TOTAL_HEAL","value":556},{"id":40,"name":"TIME_PLAYED","value":737},{"id":109,"name":"TOTAL_TIME_CROWD_CONTROL_DEALT","value":52},{"id":44,"name":"TOTAL_UNITS_HEALED","value":1},{"id":48,"name":"ASSISTS","value":5}]},{"gameId":1213499023,"invalid":false,"gameMode":"ARAM","gameType":"MATCHED_GAME","subType":"ARAM_UNRANKED_5x5","mapId":12,"teamId":100,"championId":36,"spell1":4,"spell2":14,"level":30,"createDate":1386898524946,"createDateStr":1386898524946,"fellowPlayers":[{"summonerId":21185864,"teamId":100,"championId":11},{"summonerId":20827379,"teamId":100,"championId":99},{"summonerId":182907,"teamId":200,"championId":114},{"summonerId":20321707,"teamId":200,"championId":35},{"summonerId":24576751,"teamId":200,"championId":4},{"summonerId":19646272,"teamId":100,"championId":21},{"summonerId":35268516,"teamId":100,"championId":34},{"summonerId":26540184,"teamId":200,"championId":57},{"summonerId":30405119,"teamId":200,"championId":126}],"statistics":[{"id":1,"name":"LEVEL","value":17},{"id":2,"name":"GOLD_EARNED","value":10736},{"id":4,"name":"NUM_DEATHS","value":8},{"id":6,"name":"TURRETS_KILLED","value":1},{"id":7,"name":"MINIONS_KILLED","value":35},{"id":8,"name":"CHAMPIONS_KILLED","value":4},{"id":9,"name":"GOLD_SPENT","value":7215},{"id":10,"name":"TOTAL_DAMAGE_DEALT","value":39078},{"id":11,"name":"TOTAL_DAMAGE_TAKEN","value":44041},{"id":23,"name":"WIN","value":1},{"id":93,"name":"ITEM5","value":3068},{"id":24,"name":"TEAM","value":100},{"id":92,"name":"ITEM4","value":3211},{"id":89,"name":"ITEM1","value":3401},{"id":88,"name":"ITEM0","value":2051},{"id":31,"name":"PHYSICAL_DAMAGE_DEALT_PLAYER","value":11466},{"id":91,"name":"ITEM3","value":3047},{"id":30,"name":"LARGEST_MULTI_KILL","value":1},{"id":90,"name":"ITEM2","value":3067},{"id":102,"name":"TRUE_DAMAGE_DEALT_PLAYER","value":3160},{"id":34,"name":"MAGIC_DAMAGE_TAKEN","value":25064},{"id":103,"name":"TRUE_DAMAGE_DEALT_TO_CHAMPIONS","value":828},{"id":32,"name":"MAGIC_DAMAGE_DEALT_PLAYER","value":24450},{"id":100,"name":"PHYSICAL_DAMAGE_DEALT_TO_CHAMPIONS","value":3181},{"id":33,"name":"PHYSICAL_DAMAGE_TAKEN","value":18682},{"id":101,"name":"TOTAL_DAMAGE_DEALT_TO_CHAMPIONS","value":15317},{"id":99,"name":"MAGIC_DAMAGE_DEALT_TO_CHAMPIONS","value":11307},{"id":43,"name":"TOTAL_HEAL","value":12456},{"id":40,"name":"TIME_PLAYED","value":1440},{"id":109,"name":"TOTAL_TIME_CROWD_CONTROL_DEALT","value":154},{"id":44,"name":"TOTAL_UNITS_HEALED","value":5},{"id":104,"name":"TRUE_DAMAGE_TAKEN","value":295},{"id":48,"name":"ASSISTS","value":22}]},{"gameId":1210962209,"invalid":false,"gameMode":"ARAM","gameType":"MATCHED_GAME","subType":"ARAM_UNRANKED_5x5","mapId":12,"teamId":100,"championId":21,"spell1":4,"spell2":21,"level":30,"createDate":1386726444577,"createDateStr":1386726444577,"fellowPlayers":[{"summonerId":19740447,"teamId":200,"championId":267},{"summonerId":19309695,"teamId":100,"championId":1},{"summonerId":33269458,"teamId":200,"championId":107},{"summonerId":22351227,"teamId":200,"championId":121},{"summonerId":19646272,"teamId":100,"championId":36},{"summonerId":25909446,"teamId":100,"championId":99},{"summonerId":21514165,"teamId":100,"championId":8},{"summonerId":21327734,"teamId":200,"championId":12},{"summonerId":30114682,"teamId":200,"championId":11}],"statistics":[{"id":1,"name":"LEVEL","value":15},{"id":2,"name":"GOLD_EARNED","value":9470},{"id":4,"name":"NUM_DEATHS","value":5},{"id":7,"name":"MINIONS_KILLED","value":49},{"id":8,"name":"CHAMPIONS_KILLED","value":9},{"id":9,"name":"GOLD_SPENT","value":4872},{"id":10,"name":"TOTAL_DAMAGE_DEALT","value":46896},{"id":11,"name":"TOTAL_DAMAGE_TAKEN","value":16241},{"id":16,"name":"DOUBLE_KILLS","value":1},{"id":20,"name":"KILLING_SPREES","value":3},{"id":23,"name":"WIN","value":1},{"id":22,"name":"LARGEST_KILLING_SPREE","value":3},{"id":93,"name":"ITEM5","value":3134},{"id":24,"name":"TEAM","value":100},{"id":92,"name":"ITEM4","value":3086},{"id":89,"name":"ITEM1","value":1038},{"id":88,"name":"ITEM0","value":1055},{"id":91,"name":"ITEM3","value":3181},{"id":31,"name":"PHYSICAL_DAMAGE_DEALT_PLAYER","value":43169},{"id":30,"name":"LARGEST_MULTI_KILL","value":2},{"id":90,"name":"ITEM2","value":3006},{"id":34,"name":"MAGIC_DAMAGE_TAKEN","value":5847},{"id":32,"name":"MAGIC_DAMAGE_DEALT_PLAYER","value":3726},{"id":100,"name":"PHYSICAL_DAMAGE_DEALT_TO_CHAMPIONS","value":19030},{"id":101,"name":"TOTAL_DAMAGE_DEALT_TO_CHAMPIONS","value":21324},{"id":33,"name":"PHYSICAL_DAMAGE_TAKEN","value":10143},{"id":39,"name":"LARGEST_CRITICAL_STRIKE","value":487},{"id":99,"name":"MAGIC_DAMAGE_DEALT_TO_CHAMPIONS","value":2294},{"id":43,"name":"TOTAL_HEAL","value":1318},{"id":40,"name":"TIME_PLAYED","value":995},{"id":109,"name":"TOTAL_TIME_CROWD_CONTROL_DEALT","value":71},{"id":104,"name":"TRUE_DAMAGE_TAKEN","value":251},{"id":44,"name":"TOTAL_UNITS_HEALED","value":1},{"id":48,"name":"ASSISTS","value":23}]},{"gameId":1213489791,"invalid":false,"gameMode":"ARAM","gameType":"MATCHED_GAME","subType":"ARAM_UNRANKED_5x5","mapId":12,"teamId":100,"championId":131,"spell1":4,"spell2":14,"level":30,"createDate":1386896577648,"createDateStr":1386896577648,"fellowPlayers":[{"summonerId":19806833,"teamId":100,"championId":10},{"summonerId":20827379,"teamId":100,"championId":33},{"summonerId":33717046,"teamId":200,"championId":92},{"summonerId":37452016,"teamId":200,"championId":45},{"summonerId":23807384,"teamId":200,"championId":98},{"summonerId":22340562,"teamId":100,"championId":57},{"summonerId":32487830,"teamId":200,"championId":31},{"summonerId":19646272,"teamId":100,"championId":222},{"summonerId":42045940,"teamId":200,"championId":8}],"statistics":[{"id":1,"name":"LEVEL","value":16},{"id":2,"name":"GOLD_EARNED","value":10155},{"id":4,"name":"NUM_DEATHS","value":7},{"id":6,"name":"TURRETS_KILLED","value":3},{"id":7,"name":"MINIONS_KILLED","value":46},{"id":8,"name":"CHAMPIONS_KILLED","value":10},{"id":9,"name":"GOLD_SPENT","value":6950},{"id":10,"name":"TOTAL_DAMAGE_DEALT","value":43411},{"id":11,"name":"TOTAL_DAMAGE_TAKEN","value":15565},{"id":20,"name":"KILLING_SPREES","value":3},{"id":23,"name":"WIN","value":1},{"id":22,"name":"LARGEST_KILLING_SPREE","value":3},{"id":93,"name":"ITEM5","value":3191},{"id":24,"name":"TEAM","value":100},{"id":92,"name":"ITEM4","value":3001},{"id":89,"name":"ITEM1","value":1056},{"id":88,"name":"ITEM0","value":3020},{"id":31,"name":"PHYSICAL_DAMAGE_DEALT_PLAYER","value":8551},{"id":91,"name":"ITEM3","value":3115},{"id":30,"name":"LARGEST_MULTI_KILL","value":1},{"id":90,"name":"ITEM2","value":1056},{"id":102,"name":"TRUE_DAMAGE_DEALT_PLAYER","value":658},{"id":34,"name":"MAGIC_DAMAGE_TAKEN","value":10902},{"id":103,"name":"TRUE_DAMAGE_DEALT_TO_CHAMPIONS","value":658},{"id":32,"name":"MAGIC_DAMAGE_DEALT_PLAYER","value":34201},{"id":100,"name":"PHYSICAL_DAMAGE_DEALT_TO_CHAMPIONS","value":2025},{"id":33,"name":"PHYSICAL_DAMAGE_TAKEN","value":4429},{"id":101,"name":"TOTAL_DAMAGE_DEALT_TO_CHAMPIONS","value":18700},{"id":99,"name":"MAGIC_DAMAGE_DEALT_TO_CHAMPIONS","value":16017},{"id":43,"name":"TOTAL_HEAL","value":1182},{"id":40,"name":"TIME_PLAYED","value":1064},{"id":109,"name":"TOTAL_TIME_CROWD_CONTROL_DEALT","value":100},{"id":44,"name":"TOTAL_UNITS_HEALED","value":1},{"id":104,"name":"TRUE_DAMAGE_TAKEN","value":233},{"id":48,"name":"ASSISTS","value":19}]},{"gameId":1213509955,"invalid":false,"gameMode":"ARAM","gameType":"MATCHED_GAME","subType":"ARAM_UNRANKED_5x5","mapId":12,"teamId":200,"championId":112,"spell1":14,"spell2":4,"level":30,"createDate":1386901219465,"createDateStr":1386901219465,"fellowPlayers":[{"summonerId":22904795,"teamId":200,"championId":133},{"summonerId":19387543,"teamId":100,"championId":3},{"summonerId":19646272,"teamId":200,"championId":127},{"summonerId":19791194,"teamId":100,"championId":40},{"summonerId":44421647,"teamId":100,"championId":15},{"summonerId":36031500,"teamId":200,"championId":10},{"summonerId":21442968,"teamId":200,"championId":57},{"summonerId":341116,"teamId":100,"championId":27},{"summonerId":23519553,"teamId":100,"championId":54}],"statistics":[{"id":1,"name":"LEVEL","value":12},{"id":2,"name":"GOLD_EARNED","value":7460},{"id":4,"name":"NUM_DEATHS","value":9},{"id":7,"name":"MINIONS_KILLED","value":28},{"id":8,"name":"CHAMPIONS_KILLED","value":1},{"id":9,"name":"GOLD_SPENT","value":6935},{"id":10,"name":"TOTAL_DAMAGE_DEALT","value":27520},{"id":11,"name":"TOTAL_DAMAGE_TAKEN","value":13475},{"id":25,"name":"LOSE","value":1},{"id":24,"name":"TEAM","value":200},{"id":92,"name":"ITEM4","value":1058},{"id":89,"name":"ITEM1","value":3174},{"id":88,"name":"ITEM0","value":3198},{"id":91,"name":"ITEM3","value":1026},{"id":31,"name":"PHYSICAL_DAMAGE_DEALT_PLAYER","value":2701},{"id":30,"name":"LARGEST_MULTI_KILL","value":1},{"id":90,"name":"ITEM2","value":3020},{"id":102,"name":"TRUE_DAMAGE_DEALT_PLAYER","value":354},{"id":34,"name":"MAGIC_DAMAGE_TAKEN","value":9222},{"id":103,"name":"TRUE_DAMAGE_DEALT_TO_CHAMPIONS","value":354},{"id":32,"name":"MAGIC_DAMAGE_DEALT_PLAYER","value":24465},{"id":100,"name":"PHYSICAL_DAMAGE_DEALT_TO_CHAMPIONS","value":755},{"id":33,"name":"PHYSICAL_DAMAGE_TAKEN","value":4176},{"id":101,"name":"TOTAL_DAMAGE_DEALT_TO_CHAMPIONS","value":13098},{"id":99,"name":"MAGIC_DAMAGE_DEALT_TO_CHAMPIONS","value":11989},{"id":43,"name":"TOTAL_HEAL","value":466},{"id":40,"name":"TIME_PLAYED","value":1163},{"id":109,"name":"TOTAL_TIME_CROWD_CONTROL_DEALT","value":362},{"id":104,"name":"TRUE_DAMAGE_TAKEN","value":76},{"id":44,"name":"TOTAL_UNITS_HEALED","value":1},{"id":48,"name":"ASSISTS","value":7}]}]}
';

$out = json_decode($response_string, true);*/

//var_dump($out);

/*echo urlencode('ben trades');
echo rawurlencode('ben trades');

echo date('Y-m-d H:i:s');*/

/*$test =  scandir('../services');
$test = array_diff($test, array('.','..'));
foreach( $test as $element) {
  $tmp = explode('.',$element);
  $services[] = $tmp[0];
}

var_dump($services);*/

$string = 'Aatrox|x|Fighter|x|Tank|x|4|x|8|x|3|x|6|x|2013-06-13|x|6300|x|975
||Ahri|x|Mage|x|Assassin|x|4|x|3|x|8|x|8|x|2011-12-14|x|6300|x|975
||Akali|x|Assassin|x|N/A|x|3|x|5|x|8|x|6|x|2010-05-11|x|3150|x|790
||Alistar|x|Tank|x|N/A|x|9|x|6|x|5|x|8|x|2009-02-21|x|1350|x|585
||Amumu|x|Tank|x|Mage|x|6|x|2|x|8|x|4|x|2009-06-26|x|1350|x|585
||Anivia|x|Mage|x|Support|x|4|x|1|x|10|x|8|x|2009-07-10|x|3150|x|790
||Annie|x|Mage|x|N/A|x|3|x|2|x|10|x|4|x|2009-02-21|x|450|x|260
||Ashe|x|Marksman|x|Support|x|3|x|7|x|2|x|4|x|2009-02-21|x|450|x|260
||Blitzcrank|x|Tank|x|Fighter|x|8|x|4|x|5|x|6|x|2009-09-02|x|3150|x|790
||Brand|x|Mage|x|N/A|x|2|x|2|x|9|x|6|x|2011-04-12|x|4800|x|880
||Caitlyn|x|Marksman|x|N/A|x|2|x|8|x|2|x|4|x|2011-01-04|x|4800|x|880
||Cassiopeia|x|Mage|x|N/A|x|3|x|2|x|9|x|10|x|2010-12-14|x|4800|x|880
||ChoGath|x|Tank|x|Mage|x|7|x|3|x|7|x|7|x|2009-06-26|x|1350|x|585
||Corki|x|Marksman|x|N/A|x|3|x|8|x|6|x|7|x|2009-09-19|x|3150|x|790
||Darius|x|Fighter|x|Tank|x|5|x|9|x|1|x|4|x|2012-05-23|x|6300|x|975
||Diana|x|Fighter|x|Mage|x|6|x|7|x|8|x|4|x|2012-08-07|x|6300|x|975
||Dr.Mundo|x|Fighter|x|Tank|x|7|x|5|x|6|x|4|x|2009-09-02|x|1350|x|585
||Draven|x|Marksman|x|N/A|x|3|x|9|x|1|x|10|x|2012-06-06|x|6300|x|975
||Elise|x|Mage|x|Fighter|x|5|x|6|x|7|x|8|x|2012-10-26|x|6300|x|975
||Evelynn|x|Assassin|x|Mage|x|2|x|4|x|7|x|8|x|2009-05-01|x|1350|x|585
||Ezreal|x|Marksman|x|Mage|x|2|x|7|x|6|x|8|x|2010-03-16|x|4800|x|880
||Fiddlesticks|x|Mage|x|Support|x|3|x|2|x|9|x|5|x|2009-02-21|x|1350|x|585
||Fiora|x|Fighter|x|Assassin|x|4|x|10|x|2|x|5|x|2012-02-29|x|6300|x|975
||Fizz|x|Assassin|x|Fighter|x|4|x|6|x|7|x|8|x|2011-11-15|x|6300|x|975
||Galio|x|Tank|x|Mage|x|7|x|3|x|6|x|4|x|2010-08-10|x|4800|x|880
||Gangplank|x|Fighter|x|Support|x|6|x|7|x|4|x|5|x|2009-08-19|x|3150|x|790
||Garen|x|Fighter|x|Tank|x|7|x|7|x|1|x|2|x|2010-04-27|x|450|x|260
||Gragas|x|Mage|x|Fighter|x|6|x|5|x|7|x|6|x|2010-02-02|x|3150|x|790
||Graves|x|Marksman|x|N/A|x|5|x|8|x|3|x|4|x|2011-10-19|x|4800|x|880
||Hecarim|x|Fighter|x|Tank|x|6|x|8|x|4|x|5|x|2012-04-18|x|6300|x|975
||Heimerdinger|x|Mage|x|Support|x|6|x|2|x|8|x|4|x|2009-10-10|x|3150|x|790
||Irelia|x|Fighter|x|Assassin|x|4|x|7|x|5|x|5|x|2010-11-16|x|4800|x|880
||Janna|x|Support|x|Mage|x|5|x|3|x|7|x|9|x|2009-09-02|x|1350|x|585
||JarvanIV|x|Tank|x|Fighter|x|8|x|6|x|3|x|5|x|2011-03-01|x|4800|x|880
||Jax|x|Fighter|x|Assassin|x|5|x|7|x|7|x|6|x|2009-02-21|x|1350|x|585
||Jayce|x|Fighter|x|Marksman|x|4|x|8|x|3|x|8|x|2012-07-07|x|6300|x|975
||Jinx|x|Marksman|x|N/A|x|2|x|9|x|4|x|9|x|2013-10-10|x|6300|x|975
||Karma|x|Mage|x|Support|x|7|x|1|x|8|x|8|x|2011-02-01|x|3150|x|790
||Karthus|x|Mage|x|N/A|x|2|x|2|x|10|x|8|x|2009-06-12|x|3150|x|790
||Kassadin|x|Assassin|x|Mage|x|5|x|3|x|8|x|8|x|2009-08-07|x|3150|x|790
||Katarina|x|Assassin|x|Mage|x|3|x|4|x|9|x|5|x|2009-09-19|x|3150|x|790
||Kayle|x|Fighter|x|Support|x|6|x|6|x|7|x|5|x|2009-02-21|x|450|x|260
||Kennen|x|Mage|x|Marksman|x|4|x|6|x|7|x|5|x|2010-04-08|x|4800|x|880
||KhaZix|x|Assassin|x|N/A|x|4|x|9|x|3|x|7|x|2012-09-27|x|6300|x|975
||KogMaw|x|Marksman|x|Mage|x|2|x|8|x|5|x|8|x|2010-06-24|x|4800|x|880
||LeBlanc|x|Assassin|x|Mage|x|4|x|1|x|10|x|9|x|2010-11-02|x|3150|x|790
||LeeSin|x|Fighter|x|Assassin|x|5|x|8|x|3|x|9|x|2011-04-01|x|4800|x|880
||Leona|x|Tank|x|Support|x|8|x|4|x|3|x|4|x|2011-07-13|x|4800|x|880
||Lissandra|x|Mage|x|N/A|x|5|x|2|x|8|x|8|x|2013-04-30|x|6300|x|975
||Lucian|x|Marksman|x|N/A|x|5|x|8|x|3|x|8|x|2013-08-22|x|6300|x|975
||Lulu|x|Support|x|Mage|x|5|x|4|x|7|x|7|x|2012-03-20|x|6300|x|975
||Lux|x|Mage|x|Support|x|4|x|2|x|9|x|6|x|2010-10-19|x|3150|x|790
||Malphite|x|Tank|x|Fighter|x|9|x|5|x|7|x|3|x|2009-09-02|x|1350|x|585
||Malzahar|x|Mage|x|Assassin|x|2|x|2|x|9|x|6|x|2010-06-01|x|4800|x|880
||Maokai|x|Tank|x|Mage|x|8|x|3|x|6|x|4|x|2011-02-16|x|4800|x|880
||MasterYi|x|Assassin|x|Fighter|x|4|x|10|x|2|x|2|x|2009-02-21|x|450|x|260
||MissFortune|x|Marksman|x|N/A|x|2|x|8|x|5|x|3|x|2010-09-08|x|3150|x|790
||Mordekaiser|x|Fighter|x|Mage|x|6|x|4|x|7|x|3|x|2010-02-24|x|3150|x|790
||Morgana|x|Mage|x|Support|x|6|x|1|x|8|x|6|x|2009-02-21|x|1350|x|585
||Nami|x|Support|x|Mage|x|3|x|4|x|7|x|8|x|2012-12-07|x|6300|x|975
||Nasus|x|Fighter|x|Tank|x|5|x|7|x|6|x|2|x|2009-10-01|x|1350|x|585
||Nautilus|x|Tank|x|Fighter|x|6|x|4|x|6|x|6|x|2012-02-14|x|6300|x|975
||Nidalee|x|Assassin|x|Support|x|4|x|5|x|7|x|7|x|2009-12-17|x|3150|x|790
||Nocturne|x|Assassin|x|Fighter|x|5|x|9|x|2|x|6|x|2011-03-15|x|4800|x|880
||Nunu|x|Support|x|Fighter|x|6|x|4|x|7|x|1|x|2009-02-21|x|450|x|260
||Olaf|x|Fighter|x|Tank|x|5|x|9|x|3|x|4|x|2010-06-09|x|3150|x|790
||Orianna|x|Mage|x|Support|x|3|x|4|x|9|x|10|x|2011-06-01|x|4800|x|880
||Pantheon|x|Fighter|x|Assassin|x|4|x|9|x|3|x|5|x|2010-02-02|x|3150|x|790
||Poppy|x|Fighter|x|Assassin|x|6|x|6|x|5|x|7|x|2010-01-13|x|450|x|260
||Quinn|x|Marksman|x|Fighter|x|4|x|9|x|2|x|7|x|2013-03-01|x|6300|x|975
||Rammus|x|Tank|x|Fighter|x|10|x|4|x|5|x|5|x|2009-07-10|x|3150|x|790
||Renekton|x|Fighter|x|Tank|x|5|x|8|x|2|x|3|x|2011-01-17|x|4800|x|880
||Rengar|x|Assassin|x|Fighter|x|4|x|7|x|2|x|5|x|2012-08-21|x|6300|x|975
||Riven|x|Fighter|x|Assassin|x|5|x|8|x|1|x|4|x|2011-09-14|x|4800|x|880
||Rumble|x|Fighter|x|Mage|x|6|x|3|x|8|x|8|x|2011-04-26|x|4800|x|880
||Ryze|x|Mage|x|Fighter|x|2|x|2|x|10|x|3|x|2009-02-21|x|450|x|260
||Sejuani|x|Tank|x|Fighter|x|7|x|5|x|6|x|4|x|2012-01-17|x|6300|x|975
||Shaco|x|Assassin|x|N/A|x|4|x|8|x|6|x|9|x|2009-10-10|x|3150|x|790
||Shen|x|Tank|x|Fighter|x|9|x|3|x|3|x|3|x|2010-03-24|x|3150|x|790
||Shyvana|x|Fighter|x|Tank|x|6|x|8|x|3|x|4|x|2011-11-01|x|6300|x|975
||Singed|x|Tank|x|Fighter|x|8|x|4|x|7|x|5|x|2009-04-18|x|1350|x|585
||Sion|x|Fighter|x|Mage|x|8|x|5|x|7|x|4|x|2009-02-21|x|1350|x|585
||Sivir|x|Marksman|x|N/A|x|3|x|9|x|1|x|3|x|2009-02-21|x|450|x|260
||Skarner|x|Fighter|x|Tank|x|6|x|7|x|5|x|5|x|2011-08-09|x|4800|x|880
||Sona|x|Support|x|Mage|x|2|x|5|x|8|x|1|x|2010-09-20|x|3150|x|790
||Soraka|x|Support|x|Mage|x|5|x|2|x|7|x|3|x|2009-02-21|x|450|x|260
||Swain|x|Mage|x|Fighter|x|6|x|2|x|9|x|5|x|2010-10-05|x|4800|x|880
||Syndra|x|Mage|x|Support|x|3|x|2|x|9|x|10|x|2012-09-13|x|6300|x|975
||Talon|x|Assassin|x|Fighter|x|3|x|9|x|1|x|6|x|2011-08-24|x|4800|x|880
||Taric|x|Support|x|Fighter|x|8|x|4|x|5|x|3|x|2009-08-19|x|1350|x|585
||Teemo|x|Marksman|x|Assassin|x|3|x|5|x|7|x|4|x|2009-02-21|x|1350|x|585
||Thresh|x|Support|x|Fighter|x|6|x|5|x|6|x|7|x|2013-01-23|x|6300|x|975
||Tristana|x|Marksman|x|Assassin|x|3|x|9|x|5|x|3|x|2009-02-21|x|1350|x|585
||Trundle|x|Fighter|x|Tank|x|6|x|7|x|2|x|5|x|2010-12-01|x|4800|x|880
||Tryndamere|x|Fighter|x|Assassin|x|5|x|10|x|2|x|6|x|2009-05-01|x|1350|x|585
||TwistedFate|x|Mage|x|N/A|x|2|x|6|x|6|x|9|x|2009-02-21|x|1350|x|585
||Twitch|x|Marksman|x|Assassin|x|2|x|9|x|3|x|8|x|2009-05-01|x|3150|x|790
||Udyr|x|Fighter|x|Tank|x|7|x|8|x|4|x|5|x|2009-12-02|x|1350|x|585
||Urgot|x|Marksman|x|Tank|x|5|x|8|x|3|x|8|x|2010-08-24|x|3150|x|790
||Varus|x|Marksman|x|Mage|x|3|x|7|x|4|x|6|x|2012-05-08|x|6300|x|975
||Vayne|x|Marksman|x|Assassin|x|1|x|10|x|1|x|7|x|2011-05-10|x|4800|x|880
||Veigar|x|Mage|x|N/A|x|2|x|2|x|10|x|6|x|2009-07-24|x|1350|x|585
||Vi|x|Fighter|x|Assassin|x|5|x|8|x|3|x|5|x|2012-12-19|x|6300|x|975
||Viktor|x|Mage|x|N/A|x|5|x|2|x|9|x|9|x|2011-12-29|x|6300|x|975
||Vladimir|x|Mage|x|Tank|x|6|x|2|x|8|x|2|x|2010-07-27|x|4800|x|880
||Volibear|x|Fighter|x|Tank|x|7|x|7|x|4|x|2|x|2011-11-29|x|6300|x|975
||Warwick|x|Fighter|x|Tank|x|4|x|7|x|4|x|2|x|2009-02-21|x|450|x|260
||Wukong|x|Fighter|x|Tank|x|5|x|8|x|2|x|3|x|2011-07-26|x|4800|x|880
||Xerath|x|Mage|x|Assassin|x|3|x|1|x|10|x|6|x|2011-10-05|x|4800|x|880
||XinZhao|x|Fighter|x|Assassin|x|6|x|8|x|3|x|3|x|2010-07-13|x|3150|x|790
||Yasuo|x|Fighter|x|Assassin|x|4|x|8|x|4|x|8|x|2013-12-13|x|6300|x|975
||Yorick|x|Fighter|x|Mage|x|6|x|6|x|6|x|3|x|2011-06-22|x|4800|x|880
||Zac|x|Tank|x|Fighter|x|7|x|3|x|7|x|6|x|2013-03-29|x|6300|x|975
||Zed|x|Assassin|x|Fighter|x|2|x|9|x|1|x|9|x|2012-11-13|x|6300|x|975
||Ziggs|x|Mage|x|N/A|x|4|x|2|x|9|x|6|x|2012-02-01|x|6300|x|975
||Zilean|x|Support|x|Mage|x|5|x|2|x|8|x|4|x|2009-04-18|x|1350|x|585
||Zyra|x|Mage|x|Support|x|3|x|4|x|8|x|7|x|2012-07-24|x|6300|x|975';

$string_array = explode('||', $string);
foreach ($string_array as $elem) {
    $tmp[] = explode('|x|', $elem);

}
/*var_dump($tmp);*/
foreach ($tmp as $category) {
    if ($champion = Model::factory('Champions')->where('name', $category[0])->find_one()) {
//do relations for primary

        if (!Model::factory('ChampionCategories')->where('name', $category[1])->find_one()) {
            $new_category = Model::factory('ChampionCategories')->create();
            $new_category->name = $category[1];
            $new_category_relation = Model::factory('ChampionsCategoriesRelation')->create();
            $new_category_relation->champions_id = $champion->id;
            $new_category->save();
            $new_category_relation->champion_categories_id = $new_category->id;
            $new_category_relation->save();
        } else {
            $existing_category = Model::factory('ChampionCategories')->where('name', $category[1])->find_one()->id;
            $new_category_relation = Model::factory('ChampionsCategoriesRelation')->create();
            $new_category_relation->champions_id = $champion->id;
            $new_category_relation->champion_categories_id = $existing_category;
            $new_category_relation->save();
        }



    }
}

foreach ($tmp as $category) {
    if ($champion = Model::factory('Champions')->where('name', $category[0])->find_one()) {
//do relations for secondary

        if (!Model::factory('ChampionCategories')->where('name', $category[2])->find_one()) {
            $new_category = Model::factory('ChampionCategories')->create();
            $new_category->name = $category[2];
            $new_category_relation = Model::factory('ChampionsCategoriesRelation')->create();
            $new_category_relation->champions_id = $champion->id;
            $new_category->save();
            $new_category_relation->champion_categories_id = $new_category->id;
            $new_category_relation->save();
        } else {
            $existing_category = Model::factory('ChampionCategories')->where('name', $category[2])->find_one()->id;
            $new_category_relation = Model::factory('ChampionsCategoriesRelation')->create();
            $new_category_relation->champions_id = $champion->id;
            $new_category_relation->champion_categories_id = $existing_category;
            $new_category_relation->save();
        }



    }
}



