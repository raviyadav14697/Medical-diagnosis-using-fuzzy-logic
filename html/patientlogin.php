<!DOCTYPE html>
<html lang="en-us">
<meta charset="utf-8" />
<head>
	<title>Patient login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/admin1.js" type="text/javascript"></script>
	<script src="../js/add_disease.js"  type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="../css/basic style.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>

<body>

<div class="bg-image">
        <img src="../img/background.jpg" class = "image">
    </div>

	<div class= "inside">
		
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="form">
			<h1 style="color: white">Login Here!!</h1>
			<br>
	                        <form id="loginform" class="form-horizontal" role="form" action="../php/patientlogin.php" method="post">
							<input id="login-email" type="email" class="form-control" name="email" value="" placeholder="Enter your Email id" required>
	                        <br>
							<input id="login-password" type="password" class="form-control" name="password" placeholder="Enter your password" required>
	                                <div style="margin-top:10px" class="form-group">
	                                    <div class="col-sm-12 controls">
	                                      <button type="submit" id="btn-login" href="#" class="btn btn-info" style ="color: white; border: 3px solid indigo; background-color: blueviolet;">Login  </button>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <div class="col-md-12 control">
	                                        <div style="border-top: 3px solid black; padding-top:15px; font-size:85%" ><br>
	                                            Don't have an account?
	                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
	                                           <h5 style ="color: white; border: 3px solid darkgreen; padding:4px; margin-left:20%; margin-right:20%; background-color: forestgreen;"> Sign Up Here </h5>
	                                        </a>
	                                        </div>
	                                    </div>
	                                </div>
	                            </form>
	                        </div>
</div>
	        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="form">
			<h1 style="color: white">Register Here!!</h1>    
			<br>     
	        <form id="signupform" class="form-horizontal" role="form" action="../php/patientsignup.php" method="post">

	                                <div id="signupalert" style="display:none" class="alert alert-danger">
	                                    <p>Error:</p>
	                                    <span></span>
	                                </div>
	                                        <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
											<br>
	                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
											<br>
	                                        <input type="email" class="form-control" name="email" placeholder="Email Address" required>
											<br>
	                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
											<br>
	                                    <div class="col-sm-12 controls">
	                                        <button type="submit" id="btn-signup" type="button" class="btn btn-info" style ="color: white; border: 3px solid indigo; background-color: blueviolet;">Sign Up</button>
	                                    </div>

	                            </form>
	                         </div>
	                    </div>
</div>
</body>
</html>
