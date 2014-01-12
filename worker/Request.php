<?php
require_once 'ApiEndpoint.php';
require_once 'ResponseProcessor.php';
class Request{
	private $apiE;

	public function __construct($apiEndpoint){
		$this->apiE = $apiEndpoint;
	}

	public function buildRequest($shorthand, $param){
		$service = $this->apiE->getServiceByShorthand($shorthand);
		$service->bind_param($param);
		$querystring = $this->apiE->buildQueryString($service);
		return $querystring;
	}

	public function performRequest($querystring){
		$ch = curl_init();
    //echo $querystring;
		$options = array(
			CURLOPT_URL => $querystring,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_VERBOSE => true
			);
		curl_setopt_array($ch,$options);

		if(! $result = curl_exec($ch)){
			echo "error occured while curl exec of ".$querystring;
		}
		curl_close($ch);
		return $result;
	}	
}


//Testcode below here

/*$apiE = new ApiEndpoint();
$request = new Request($apiE);
$rp = new ResponseProcessor();
$apiE->add_service('RecentGames');
$data = $rp->process($request->performRequest($request->buildRequest('RecentGames',23107213)));
var_dump ($data['games'][0]);*/

/*$apiE = new ApiEndpoint();
$request = new Request($apiE);
$rp = new ResponseProcessor();
$rp->processSummonerIdCall($request->performRequest($request->buildRequest('SummonerIdByName', 'dwaynehart')),'2');*/
?>


