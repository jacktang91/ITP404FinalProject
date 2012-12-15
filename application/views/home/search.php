<?php
	echo '<ul>';
	foreach($search_results->movies as $movie){
		echo '<li><a href="'.URL::to('movies/film').'?id='.$movie->id.'&title='.urlencode($movie->title).'">'.'<img src="'.$movie->posters->profile.'" class="search_img"></a></li>';
	}
	echo '</ul>';

	