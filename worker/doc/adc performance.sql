select summoner.name, AVG(game_statistic.minions_killed), AVG(game_statistic.champions_killed), AVG(game_statistic.num_deaths),AVG(game_statistic.assists), Count(game.id) as `games played`, AVG(game_statistic.time_played) as `played`, MAX(game_statistic.gold_earned) as `gold`, (AVG(game_statistic.gold_earned)/ AVG(game_statistic.time_played))*60 as `AVG GPM`   from champion_category_relation as ccr  join champion on champion.id = ccr.champion_id join game on game.champion_id = champion.id join summoner on game.summoner_id = summoner.id
join game_statistic on game.id = game_statistic.game_id
where ccr.champion_category_id = 5 AND ( game.sub_type = "NORMAL" OR game.sub_type = "RANKED_SOLO_5x5") AND summoner.is_user = 1
GROUP BY summoner.id
Having `games played`> 4
