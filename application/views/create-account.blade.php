<html>
<head>
	<title>Create an Account</title>
	<link rel="stylesheet" href="<?php echo URL::to_asset('css/create.css') ?>">
</head>
<body>
	<div id="header"><h1>Movie Trender - Create Your Account</h1></div>
	<div id="nav">
		<ul>
			<li><a href="<?php echo URL::to('movies/index')?>" id="home">Home</a></li>
			<li><a href="<?php echo URL::to('movies/create')?>" id="create">Create Account</a></li>
		</ul>
	</div>
	<div id="container">
		<div id="errors">
				{{$errors->first('fname','<p>First Name:Required field.</p>')}}
				{{$errors->first('lname','<p>Last Name: Required field.</p>')}}
				{{$errors->first('user','<p>Username: Required field and must be min 5 characters.</p>')}}
				{{$errors->first('email','<p>Email: Must be a valid email address.</p>')}}
				{{$errors->first('password','<p>Password: Must be min 5 characters and must verify with each other.</p>')}}
		</div>
		@if(Session::get('success'))
			<div>{{ Session::get('success') }}</div>
		@endif	
		<div id="formbox">
		<form action="{{URL::to('movies/added')}}" method="get" id="createaccount">
			<label>First Name</label> <input type="text" name="fname" id="fname" value="{{ Input::old('fname') }}"><br/><br/>
			<label>Last	 Name</label> <input type="text" name="lname" id="lname" value="{{ Input::old('lname') }}"><br/><br/>
			<label>Username</label> <input type="text" name="user" id="user" value="{{ Input::old('user') }}"><br/><br/>
			<label>Email</label> <input type="text" name="email" id="email" value="{{ Input::old('email') }}"><br/><br/>
			<label>Password</label> <input type="text" name="password" id="password" value="{{ Input::old('password') }}"><br/><br/>
			<label>Verify Password</label> <input type="text" name="password_confirmation" id="password_confirmation" value="{{ Input::old('password_confirmation') }}"><br/><br/>

			 <center><input type="submit" value="Submit"></center>

		</form>
		</div>
	</div>
</body>
</html>