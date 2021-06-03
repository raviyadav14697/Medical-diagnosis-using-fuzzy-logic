<!DOCTYPE html>
<html lang="en-us">
<meta charset="utf-8" />
<head>
	<title>Add Disease</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../js/add_disease.js" type="text/javascript"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/basic style.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

</head>

<body style="background-color: skyblue;">

	<div class= "inside2">
				<div class="alert alert-info">
							<?php session_start(); ?>
							<?php echo "Hello, ".$_SESSION['demail']."!" ;?>
							<?php if(!isset($_SESSION['demail'])) header('location:disease_prediction_system.php'); ?>
							<a class=" btn btn-danger col-md-offset-10" href="../php/logout.php" >Logout</a>
					</div>

			<div class="container">
					
					<h1><b>Disease Knowledge Base</b></h1>
			</div>

			<br><br>

		<div class="container vertical-gap" >
		<div class="jumbotron" style="background-color: transparent; border: 2px solid black;">
			<div class="row container">
				<h4 ><u>Disease Details<u></h4>
			</div>
			<br>
			<div class="row">
				<div class="dname col-md-2 "> <!-- col-md-offset-2 -->
					<input type="text" name="dname" placeholder="Disease Name" class="form-control input-group-lg " id="dname" autofocus>
				</div>
				<div class="specialist col-md-2 "> <!-- col-md-offset-2 -->
					<input type="text" name="specialist" placeholder="Specialist" class="form-control input-group-lg " id="specialist">
				</div>
				<div class="form-group col-md-6">
				  <textarea placeholder="Enter Precautions" name="precaution" class="form-control" rows="5" id="precaution"></textarea>
				</div>
			</div>
		</div>
</div>



		<div class="container main_sym vertical-gap">
		<div class="jumbotron" style="background-color: transparent; border: 2px solid black;">
			<div class=" row container">
				<h4>Symptom Details</h4>
			</div>

			<div class=" add_sym">
				<div class="row">
					<div class="col-md-2 ">
						<input type="text" placeholder="Symptom" class="form-control input-group-lg" id="sname">
					</div>
					<div class="checkbox col-md-2">
							<label><input id="mycheck" type="checkbox"  value="">Range</label>
				 </div>
					<div class="col-md-2 ">
						<input type="number"  placeholder="No." class="form-control input-group-lg" id="no">
					</div>
					<div class="col-md-2 col-sm-offset-1">
						<input type="number"  placeholder="Weight" class="form-control input input-group-lg" id="weight">
					</div>
					<div class="col-md-2 col-sm-offset-1">
						<button type="submit" name="submit" class="btn btn-default btn-primary button" onclick="f2()">ADD SYMPTOM</button>
					</div>
				</div>
			</div>
		</div>
</div>

		<div id="add_here" class="container">

		</div>

		<div class="container vertical-gap">
			<div class="row">
				<div class="col-md-2 col-md-offset-5">
						<button type="submit" id="save" name="submit" class="btn btn-default btn-primary button" onclick="send_data()">SAVE</button>
				</div>
			</div>
		</div>

  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" id="modal_button" data-target="#myModal">Open Modal</button>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">RESULTS</h4>
        </div>
        <div class="modal-body">
          <p>Knowledge base added</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
		</div>
</body>
</html>
