<?php

class Rottentomatoes{

	protected $key = "raafyhmatay6vdfqjb9dghgc";

	public function getBoxOfficeFromJSONByCountry($country){
		$limit = 10;
		$key = $this->key;
		$url = "http://api.rottentomatoes.com/api/public/v1.0/lists/movies/box_office.json?limit=$limit&country=$country&apikey=$key";
		$jsonString = file_get_contents($url);
		$arrayOfString = json_decode($jsonString);
		return $arrayOfString;
	}

	public function getOpeningSoonFromJSONByCountry($country){
		$limit = 10;
		$key = $this->key;
		$url = "http://api.rottentomatoes.com/api/public/v1.0/lists/movies/upcoming.json?page_limit=$limit&page=1&country=$country&apikey=$key";
		$jsonString = file_get_contents($url);
		$arrayOfString = json_decode($jsonString);
		return $arrayOfString;
	}

	public function getMovie($movie){
		$key = $this->key;
		$url = "http://api.rottentomatoes.com/api/public/v1.0/movies.json?q=$movie&apikey=$key";
		$jsonString = file_get_contents($url);
		$arrayOfString = json_decode($jsonString);
		return $arrayOfString;
	}

	public function getInfo($id){
		$key = $this->key;
		$url ="http://api.rottentomatoes.com/api/public/v1.0/movies/$id.json?apikey=$key";
		$jsonString = file_get_contents($url);
		$arrayOfString = json_decode($jsonString);
		return $arrayOfString;
	}
}
