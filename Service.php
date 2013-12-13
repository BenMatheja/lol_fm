<?php
/**
* Abstract Service class
* defines shared behaviour for pluggable services
*/
abstract class Service{

	abstract public function create_service_uri();

	abstract public function bind_param();

}
?>
