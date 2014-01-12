<?php
class ResponseProcessor{
	
	public function __construct(){

	}
    /*
     * decode the json response to associative array
     */
	public function process($response){
	$decoded = json_decode($response,TRUE);
	return $decoded;
	}
}

