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
		<div id="formbox">
			<center>Account was successfully added!</center>
		</div>
	</div>
</body>
</html>