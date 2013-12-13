<?php
class ResponseProcessor{
	
	public function __construct(){

	}

	public function process($response){
	$decoded = json_decode($response,TRUE);
	return $decoded;
	}
}

