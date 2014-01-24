SELECT Count(champion.id) as `sum`, champion.name, summoner.name from game join champion on game.champion_id = champion.id join summoner on summoner.id = game.summoner_id
where game.summoner_id = 1 AND (game.sub_type = "NORMAL" OR game.sub_type = "RANKED_SOLO_5x5" OR game.sub_type ="BOT_3x3" OR game.sub_type = "BOT_5x5")
GROUP BY game.champion_id
having `sum` > 1
order by `sum` DESC
