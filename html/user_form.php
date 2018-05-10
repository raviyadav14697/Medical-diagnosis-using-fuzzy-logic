<!DOCTYPE html>
<html lang="en-us">
<meta charset="utf-8" />
<head>
    <title>User Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/user_form.js"  type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="../css/add_disease.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<style rel="stylesheet">

				.vertical-gap{
						margin-top: 40px;
				}



		</style>

</head>

<body>

		<div class="container">
				<div class="alert alert-info">
						<?php session_start(); ?>
						<?php echo "Hello, ".$_SESSION['pemail']; ?>
						<?php if(!isset($_SESSION['pemail'])) header('location:disease_prediction_system.php'); ?>
						<a class=" btn btn-primary col-md-offset-10" href="../php/logout.php" >Logout</a>
            <h1>Select your symptom levels!</h1>
				</div>
		</div>

		<div class="container ">
	    <div id="add_here">
	    </div>
	</div>

	<div class="container">
		<div class="vertical-gap">
				<button class="btn btn-default btn-primary col-sm-offset-5" onclick="make_string()">Evaluate Symptoms!</button>
				
		</div>
	</div>
</body>

</html>
