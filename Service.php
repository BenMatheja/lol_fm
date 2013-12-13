<?php
/**
* Abstract Service class
* defines shared behaviour for pluggable services
*/
abstract class Service{

	abstract public function get_title();

	abstract public function get_uri();

	abstract public function bind_param();

}
?>
