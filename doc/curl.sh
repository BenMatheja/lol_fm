echo "GET http://prod.api.pvp.net/api/lol/euw/v1.1/summoner/by-name/ben%20trades"
curl --request GET 'http://prod.api.pvp.net/api/lol/euw/v1.1/summoner/by-name/ben%20trades?api_key=35da3603-59cc-4b24-8b87-8accc987c528' --include

echo "GET http://prod.api.pvp.net/api/lol/euw/v1.1/game/by-summoner/23107213/recent"
curl --request GET 'http://prod.api.pvp.net/api/lol/euw/v1.1/game/by-summoner/23107213/recent?api_key=35da3603-59cc-4b24-8b87-8accc987c528' --include
