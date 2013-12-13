<?php
class Service{
	private $title;
	private $uri;

	public function __construct($title, $uri){
	$this->title = $title;
	$this->uri = $uri;
	}

	public function getTitle(){
		return $this->title;
	}

	public function getUri(){
		return $this->uri;
	}
}