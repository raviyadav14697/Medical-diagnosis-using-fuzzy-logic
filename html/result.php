<!DOCTYPE html>
<html lang="en-us">
<meta charset="utf-8" />
<head>
    <title>Result</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/result.js" type="text/javascript"></script>

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9-2Dp8L1VWXFXI2S2rvRVhTH3x0lhBLY&libraries=places" ></script>
    <link rel="stylesheet" type="text/css" href="../css/add_disease.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<style rel="stylesheet">

			.vertical-gap{
					margin-top: 40px;
			}

		    #map, #precaution {
		    	height: 600px;

		    }


	</style>


	<!--
		/*
		$(document).ready(function(){
				var queryString = decodeURIComponent(window.location.search);
				var ind = queryString.indexOf("?");
				var json = JSON.parse(queryString.substring(ind+1,queryString.length));

				json = json.substring(1,json.length-1);
				console.log(json);
				var str = json.split[','];
				for(var i=0; i<str.length; i++)
				{
					console.log(str[i]);
				}

				$('#result').append(json);

		}

		function fun1() {

		}

		function fun2() {
			//initMap();
		}
		*/
	-->

</head>

<body>



	<div class="container alert alert-info ">
		<?php session_start(); ?>
		<?php echo "Hello, ".$_SESSION['pemail']; ?>
		<?php if(!isset($_SESSION['pemail'])) header('location:disease_prediction_system.php'); ?>
		<a class=" btn btn-primary col-md-offset-10" href="../php/logout.php" >Logout</a>
	    <div id="result" class="container	">
	    </div>
	</div>


	<div class="container">
			<div id="map"></div>
    		<div id="precaution" style="margin-top: 30px"></div>
	</div>


</body>

</html>
