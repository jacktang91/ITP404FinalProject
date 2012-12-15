<html>
<head>
	<meta charset="utf-8" />
	<title>Movie Search Results Page</title>
	<link rel="stylesheet" href="<?php echo URL::to_asset('css/results.css') ?>">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
</head>
<body>
	<div id="header"><h1>Movie Trender-Search Results: <span id="title"><?php echo $id->title?></span></h1></div>
	<div id="nav">
		<ul>
			<li><a href="<?php echo URL::to('movies/index')?>" id="home">Home</a></li>
			<li><a href="<?php echo URL::to('movies/create')?>" id="create">Create Account</a></li>
		</ul>
	</div>
	<div id="container">
		<div id="info">
			<div id="poster"><?php echo "<img src='".$id->posters->detailed."'>"; ?></div>
			<div id="basic_info">
				<strong>Title:</strong> <?php echo $id->title; ?> <br/>
				<strong>Release:</strong> <?php echo $id->year?>	<br/>
				<strong>MPAA Rating:</strong> <?php echo $id->mpaa_rating?> <br/>
				<strong>Ratings (Rotten Tomatoes):</strong> <?php echo $id->ratings->critics_rating?>
				</br>

				<!-- Tweets in list form -->
				<div id="twitterfeed">
					<strong>Twitter Feed</strong>
					<div id="feed">
					<ol><script type="text/x-handlebars-template" id="page-template">
						</li>
						<p><img src='{{profile_image_url}}'><strong>Username:</strong>{{from_user_name}}</p>
						{{text}}

						</li>
					</script></ol>
					</div>
				</div>
			</div>

			<!-- // Map  -->
			<div id="map">
			</div>


		</div>
		<?php 
			echo "<script type='text/javascript' 
				src='//www.google.com/trends/embed.js?hl=en-US&cat=0-3-34
				&q=$id->title
				&geo=US
				&date=today+1-m
				&cmpt=q&content=1&cid=TIMESERIES_GRAPH_0
				&export=5&w=1000&h=330'></script>";
			echo "<h2>Google Trending Information For $id->title in the Past 30 Days</h2>"
		?>
	</div>
</body>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
	<script src="<?php echo URL::to_asset('js/handlebars-1.0.rc.1.js') ?>"></script>
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>	
	<script src="<?php echo URL::to_asset('js/map.js') ?>"></script>
</html>