
var title = getURL();

var currentLat = 34.032795;
var currentLng = -118.287741
var currentLocation = new google.maps.LatLng(currentLat,currentLng);

var myOptions = {
	zoom: 2,
	center: currentLocation,
	mapTypeId: google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById("map"), myOptions);

var marker = new google.maps.Marker({
	position: currentLocation,
	title: "Current Location",
});

marker.setMap(map);		

var script = document.createElement('script');
script.src = "http://search.twitter.com/search.json?q="+title+"&geocode=34,-118,100mi&callback=processJSONP";
document.getElementsByTagName('head')[0].appendChild(script);

var templateString = document.getElementById('page-template').innerHTML;
var templateFunction = Handlebars.compile(templateString);
var html = '';

var geocoder;


function processJSONP(tweetData){
	console.log(tweetData);

	for(var i=0;i<tweetData.results.length;i++){
		geocoder = new google.maps.Geocoder();
		var address = '';
		var title = '';
		var image = '';
		var text = '';
		var date = '';
		address = tweetData.results[i].location;
		image = tweetData.results[i].profile_image_url;
		text = tweetData.results[i].text;
		title = tweetData.results[i].from_user_name;
		date = tweetData.results[i].created_at;
		getAddress(address,title,image,text,date);

		//Client Template
		html = html + templateFunction(tweetData.results[i]);
		console.log(html);
	};
	document.getElementById('feed').innerHTML = html;
}

function getAddress(address,title,image,text,date){
	geocoder.geocode( {'address': address}, function(results,status) {
		if (status == google.maps.GeocoderStatus.OK) {
	        var marker = new google.maps.Marker({
	            map: map,
	            position: results[0].geometry.location,
	            title:'Tweet From: ' + title

	        });
	        var infowindow = new google.maps.InfoWindow({
	        	content: "<div id='tweets'><img src='"
	        		+image+"'/><strong><center>"
	        		+title+"</center></strong><br/><br/>"
	        		+"<center>Location: "+address+"</center></br></br>"
	        		+text+"<br/><br/>"
	        		+"created: " + date
	        		+"</div>"
	        })
	        google.maps.event.addListener(marker,'click',function(){
	        	infowindow.open(map,marker);
	        });


	    } else {
	        console.log("Geocode was not successful for the following reason: " + status);
	    }
	});
}

function getURL(){
	var url = ''
	url = window.location.toString();
	var index = url.indexOf("=")+1;
	url = url.substr(index);
	index = url.indexOf("=")+1;
	url = url.substr(index);
	return url;
}