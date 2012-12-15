<?php
class Twitter{

	public function getTweets($movie) {
		$url = "http://search.twitter.com/search.json?q=$movie&geocode=34,-118,100mi";
		$jsonString = file_get_contents($url);
		$arrayOfTweets = json_decode($jsonString);
		return $arrayOfTweets;
	}

}
