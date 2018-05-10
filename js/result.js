 //alert(window.opener.getJSON());
$(document).ready(function(){

 	var json = window.opener.getJSON();
 	//alert(json);
 	var len = Object.keys(json).length;
 	var i = 1;
 	var str = '';

 	var tuple1 = '<td><button class="btn btn-primary" onclick="precaution(this)"  id="';
	var tuple2 = '">Precautions</button></td><td><button class="btn btn-primary" onclick="initMap(this)"  id="';

	var tb1 = '<div class="vertical-gap"><table class="table table-responsive table-bordered "><thead><tr><th>Sr No. </th><th>Disease</th><th>Severity(in %)</th><th>Prediction Result</th><th>Precautions</th><th>Nearby Doctors</th></tr></thead><tbody>';
	var tb2 = '</tbody></table></div>';
 	for(key in json){

		str += '<tr><td>'+i+'</td>'+'<td>'+key+'</td>'+'<td>'+json[key].toFixed(2)+'</td>';
	    var danger = '<td class="text-danger">High Possibility of '+key+'</td>';
	    var normal = '<td class="text-success">Low Possibility of '+key+'</td>';
	    if(json[key] > 50)
	        str += danger;
	    else
	        str += normal;

	    str += tuple1+key+tuple2+key+'">Nearby Doctors</button></td></tr>';
		//alert(str);
 		console.log(key + "==>" + json[key]);
 		i++;
 	}
 	$('#result').append(tb1+str+tb2);
 	//$('#map').hide();
 	//document.getElementById(result).innerHTML = (tb1+str+tb2);
 });


var map;
var infowindow;
var geolocate;
var specialist = '';

function precaution(e)
{
	//alert(e.id);
	$.ajax
	({
			url : "../php/map.php",
			type : "POST",
			data : {
				"disease" : e.id,
				"type" : 0
			},
			success : function(data){
				$('#precaution').html('<div id ="prec1" class="jumbotron text-justify" style="font-family:Comic Sans MS, cursive, sans-serif">');
				$('#prec1').html('<h2>Precaution for '+e.id+' </h2>'+data+'</div>');
				

				//animate
				$('html, body').animate({
					scrollTop: $("#prec1").offset().top
		        }, 3000);
				//console.log(data);
			},
			error : function(err)
			{
				alert('error in ajax');
			}
	});

}


function initMap(e){


		//finding the specialist for selected disease
		$.ajax({
			url : "../php/map.php",
			type : "POST",
			data : {
				"disease" : e.id,
				"type" : 1
			},
			success : function(data){
				specialist = data;
				//console.log(specialist);
			}
		});


		if (navigator.geolocation){

	    navigator.geolocation.getCurrentPosition(function(position) {
    		//console.log('in');
	         geolocate = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

	         map = new google.maps.Map(document.getElementById('map'), {
	            center: geolocate,
	            zoom: 12,
	            mapTypeId: google.maps.MapTypeId.ROADMAP
	        });

	        infowindow = new google.maps.InfoWindow();
	        /*
	        var service = new google.maps.places.PlacesService(map);
	        service.nearbySearch({
	          location: latlng,
	          radius: 1000,
	          type: ['doctor']
	        }, callback);
	        */
          var myLatLng = {lat: position.coords.latitude, lng: position.coords.longitude};
          console.log(position.coords.latitude+" "+position.coords.longitude);
           var marker = new google.maps.Marker({
             map: map,
             icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
             position: myLatLng
           });

           google.maps.event.addListener(marker, 'click', function() {
             //console.log(place);
             infowindow.setContent('My Address');
             infowindow.open(map, this);
           });

	        var request = {
	          location: map.getCenter(),
	          radius: '1',
	          query: specialist
	        };
	        //console.log(map.getCenter());
	        var service = new google.maps.places.PlacesService(map);
	        service.textSearch(request, callback);

	    });

	}
	else
	      alert("Geolocation is not supported by this browser.");

}

function callback(results, status) {
	//console.log(specialist);

	if (status === google.maps.places.PlacesServiceStatus.OK) {

	  for (var i = 0; i < results.length; i++) {
	    createMarker(results[i]);
	    //console.log(results[i].name)
	  }
	  $('html, body').animate({
			scrollTop: $("#map").offset().top
      }, 3000);
	}
}

function createMarker(place) {
	var placeLoc = place.geometry.location;
	var marker = new google.maps.Marker({
	  map: map,
	  position: place.geometry.location
	});

	google.maps.event.addListener(marker, 'click', function() {
	  console.log(place);


	  infowindow.setContent(place.name+'<br/>'+place.formatted_address);
	  infowindow.open(map, this);
	});
}
