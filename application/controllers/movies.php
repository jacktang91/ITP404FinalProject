<?php

class Movies_Controller extends Base_Controller{
	//First Page
	public function action_index(){
		//Rotten Tomatoes Data
		$rt = new Rottentomatoes();
		$box_office = $rt->getBoxOfficeFromJSONByCountry('us');
		$open_soon = $rt->getOpeningSoonFromJSONByCountry('us');

		//create array for data to be passed to homepage
		$data = array(
			'box_office'=>$box_office,
			'open_soon' =>$open_soon,
		);

		return View::make('home.home', $data);
	}

	//For searching
	public function action_search(){
		$search_term = $_GET['searchTerm'];
		$search_term = urlencode($search_term);
		$rt = new Rottentomatoes();
		
		$search_results = $rt->getMovie($search_term);

		$data = array(
			'search_term' => $search_term,
			'search_results' =>$search_results
		);

		return View::make('home.search',$data);
	}


	//Film Results Page
	public function action_film(){
		$id = $_GET['id'];
		$rt = new Rottentomatoes();
		$id = $rt->getInfo($id);

		$twitter = new Twitter();
		$tweets = $twitter->getTweets(urlencode($id->title));

		$data = array(
			'id' =>$id,
			'tweets' =>$tweets

		);

		return View::make('home.film',$data);
	}

	public function action_create(){
		return View::make('create-account');
	}

	public function action_added(){
			$fname = Input::get('fname');
			$lname = Input::get('lname');
			$user = Input::get('user');
			$email = Input::get('email');
			$pass = Input::get('password');
			$password_confirmation = Input::get('confirm');
			
			$validation = Movies::validate(Input::all());

			if($validation->fails()){

				return Redirect::to('movies/create')
					->with_input()
					->with_errors($validation);
			}
			else{
				Movies::add($fname,$lname,$user,$pass,$email);

				return View::make('home.added');
			}

	}
	
}