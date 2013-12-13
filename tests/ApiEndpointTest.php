<?php
require '../ApiEndpoint.php';
require 'Testcase.php';
class ApiEndpointTest extends Testcase{
	private $apiE;

	public function __construct(){
		$this->run();
	}
	public function run(){
		$this->testIfClassIsInstanceable();
		$this->testIfServiceCanBeAdded();
		$this->testIfServiceCanBeRetrieved();
	}

	public function testIfClassIsInstanceable(){
		$this->apiE = new ApiEndpoint();
		$desired = "ApiEndpoint";
		if(get_class($apiE) == $desired){
			echo "Class has been successfully instantiated".PHP_EOL;
		}
		else{
			echo "Class ".get_class($apiE)." not matching desired ".$desired.PHP_EOL;
		}
		$this->apiE = null;
	}

	public function testIfServiceCanBeAdded(){
		$this->apiE = new ApiEndpoint();
		if($apiE->add_service("RecentGames")){
			echo "Service RecentGames has been added successfully".PHP_EOL;
		}
		else
			echo "Service RecentGames could not be added".PHP_EOL;
	}

	public function testIfServiceCanBeRetrieved(){
		$service = $this->apiE->get_service_by_shorthand("RecentGames");
		$desired = "recentgames_service";
		if(get_class($service) == $desired){
			echo "Class has been successfully instantiated".PHP_EOL;
		}
		else{
			echo "Class ".get_class($service)." not matching desired ".$desired.PHP_EOL;
		}
		$this->apiE = null;

	}



	
}
?>

