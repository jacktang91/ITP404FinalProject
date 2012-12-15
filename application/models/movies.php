<?php

class Movies{

	public static function add($fname=null, $lname=null, $user=null, $email=null, $pass=null){
		$add = DB::table('users')->insert_get_id(array(
			'fname' => $fname,
			'lname' => $lname,
			'user' => $user,
			'email'=>$email,
			'pass' => $pass
		));

		return $add;
	}

	public static function getData(){
		$allData = DB::table('users')->get();

		return $allData;
	}

	protected static $rules = array(
		'fname'=>'required',
		'lname'=>'required',
		'user' =>'required|min:5',
		'email'=>'required|email',
		'password' =>'required|min:5|confirmed'
		
	);

	public static function validate($input){
		$validation = new Validator($input,static::$rules);
		return $validation;
	}


}

