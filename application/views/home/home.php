<html>
<head>
	<title>Movie Trend Page - ITP 404: Final Project</title>
	<link rel="stylesheet" href="<?php echo URL::to_asset('css/main.css') ?>">
	<link rel="stylesheet" href="<?php echo URL::to_asset('css/jMyCarousel.css') ?>">
<body>
	<div id="header"><h1>Movie Trender</h1></div>
	<div id="nav">
		<ul>
			<li><a href="<?php echo URL::to('movies')?>" id="home">Home</a></li>
			<li><a href="<?php echo URL::to('movies/create')?>" id="create">Create Account</a></li>
		</ul>
	</div>
	<div id="container">
	
	<!-- Search Form -->
	<div id="formbox">
	<form action="" method="get" id="form">
		<input type="text" name="search-term" id="searchbox" class="search"> <input type="submit" value="Search">
	</form>
	</div>

	<div id="search_results">
		<!-- Where search results will be displayed -->
	</div>
	

	<?php
		//Display Movies Coming Soon List
		echo '<div class="list">';
		echo '<h2>Movies Coming Soon</h2>';
		echo '<table border="0" id="box_office_table">';;
			echo '<tr>';
				echo '<th></th>';
				echo '<th>Movie Title</th>';
				echo '<th>Release</th>';
			echo'</tr>';		
		$i=1;
		foreach($open_soon->movies as $movie){
			echo '<tr>';
				echo "<td>$i</td>";
				echo "<td><a href='".URL::to('movies/film').'?id='.$movie->id.'&title='.urlencode($movie->title)."'>$movie->title</a></td>";
				echo "<td>".$movie->release_dates->theater."</td>";
			echo '</tr>';
			$i++;
		}
		echo '</table>';
		echo '</div>';

		//Display Box Office List
		echo '<div class="list">';
		echo '<h2>Top Current Box Office Movies</h2>';
		echo '<table border="0" id="box_office_table">';;
			echo '<tr>';
				echo '<th></th>';
				echo '<th>Movie Title</th>';
			echo'</tr>';		
		$i=1;
		foreach($box_office->movies as $movie){
			echo '<tr>';
				echo "<td>$i</td>";
				echo "<td><a href='".URL::to('movies/film').'?id='.$movie->id.'&title='.urlencode($movie->title)."'>$movie->title</a></td>";
			echo '</tr>';
			$i++;
		}
		echo '</table>';
		echo '</div>';
	
	//Google Trends Map
		$i=0;
		$list='';
	foreach($box_office->movies as $movie){;
		$graph_list[$i]= urlencode($movie->title);
		$list=$list.$graph_list[$i].',+';
		$i++;
	}
	echo "<div id='home_google_trend'>";
		echo "<script type='text/javascript' 
			src='//www.google.com/trends/embed.js?hl=en-US&cat=0-3-34
			&q=$list
			&geo=US
			&date=today+1-m
			&cmpt=q&content=1&cid=TIMESERIES_GRAPH_0
			&export=5&w=1000&h=330'></script>";
		echo "<h2>Google Trending Information For Top 5 Box Office Movies in the Past 30 Days</h2>";

	echo "</div>";
	?>

	</div>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
	<script src="<?php echo URL::to_asset('js/jMyCarousel.js') ?>"></script>
	<script src="<?php echo URL::to_asset('js/search.js') ?>"></script>

</body>
</html>