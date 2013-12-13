<?php
require 'ApiEndpoint.php';
require 'config/config.php';
require 'ResponseProcessor.php';
class Request{
	private $apiE;

	public function __construct($apiEndpoint){
		$this->apiE = $apiEndpoint;
	}

	public function buildRequest($shorthand, $param){
		$service = $this->apiE->get_service_by_shorthand($shorthand);
		$service->bind_param($param);
		$querystring = $this->apiE->build_query_string($service);
		return $querystring;
	}

	public function performRequest($querystring){
		$ch = curl_init();
		$options = array(
			CURLOPT_URL => $querystring,
			CURLOPT_HEADER => false,
			CURLOPT_MUTE => true
			);
		curl_setopt_array($ch,$options);

		if(! $result = curl_exec($ch)){
			echo "error occured while curl exec of ".$querystring;
		}
		curl_close($ch);
		return $result;

	}	
}

/**
*Testcode below here
*/
$apiE = new ApiEndpoint();
$request = new Request($apiE);
$rp = new ResponseProcessor();
$apiE->add_service('RecentGames');
$data = $rp->process($request->performRequest($request->buildRequest('RecentGames',23107213)));

var_dump ($data[0]);

?>


