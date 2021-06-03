<!DOCTYPE html>
<html lang="en-us">
<meta charset="utf-8" />
<head>
    <title>Result</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/result.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="../css/basic style.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	
</head>

<body style="background-color: skyblue;">
<br><br>
	<div class="container alert alert-info ">
		<?php session_start(); ?>
		<?php echo "Hello, ".$_SESSION['pemail']; ?>
		<?php if(!isset($_SESSION['pemail'])) header('location:disease_prediction_system.php'); ?>
		<a class=" btn btn-danger col-md-offset-10" href="../php/logout.php" >Logout</a>
		<br>
	    <div id="result" class="container	">
	    </div>
	</div>
	
	<div class="container">
			<div id="map" style ="height:750px;"><h5><b>Doctors Nearby: <b></h5><br><iframe width="100%" height="90%" style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/search?q=doctors%20near%20me&key=AIzaSyBhKby_bqftsSOZnHM3H0DBor_I1iJlFpY"></iframe></div>
    		<div id="precaution" style="margin-top: 30px"></div>
	</div>
</body>

</html>
