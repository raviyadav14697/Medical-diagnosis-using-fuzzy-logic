<!DOCTYPE html>
<html lang="en-us">
<meta charset="utf-8" />
<head>
	<title>Doctor login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>

<body>


	<div class="container">
	        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
	            <div class="panel panel-info" >
	                    <div class="panel-heading">
	                        <div class="panel-title">Doctor Sign In</div>
	                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
	                    </div>

	                    <div style="padding-top:30px" class="panel-body" >

	                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

	                        <form id="loginform" class="form-horizontal" role="form" action="../php/doctorlogin.php" method="post">

	                            <div style="margin-bottom: 25px" class="input-group">
	                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	                                        <input id="login-email" type="email" class="form-control" name="email" value="" placeholder="email" required>
	                                    </div>

	                            <div style="margin-bottom: 25px" class="input-group">
	                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password" required>
	                                    </div>



	                            <div class="input-group">
	                                      <div class="checkbox">
	                                        <label>
	                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
	                                        </label>
	                                      </div>
	                                    </div>


	                                <div style="margin-top:10px" class="form-group">
	                                    <!-- Button -->

	                                    <div class="col-sm-12 controls">
	                                      <button type="submit" id="btn-login" href="#" class="btn btn-success">Login  </button>
	                                    </div>
	                                </div>


	                                <div class="form-group">
	                                    <div class="col-md-12 control">
	                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
	                                            Don't have an account!
	                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
	                                            Sign Up Here
	                                        </a>
	                                        </div>
	                                    </div>
	                                </div>
	                            </form>



	                        </div>
	                    </div>
	        </div>
	        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
	                    <div class="panel panel-info">
	                        <div class="panel-heading">
	                            <div class="panel-title">Doctor Sign Up</div>
	                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
	                        </div>
	                        <div class="panel-body" >
	                            <form id="signupform" class="form-horizontal" role="form" action="../php/doctorsignup.php" method="post">

	                                <div id="signupalert" style="display:none" class="alert alert-danger">
	                                    <p>Error:</p>
	                                    <span></span>
	                                </div>



	                                

	                                <div class="form-group">
	                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
	                                    <div class="col-md-9">
	                                        <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
	                                    <div class="col-md-9">
	                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label for="email" class="col-md-3 control-label">Email</label>
	                                    <div class="col-md-9">
	                                        <input type="email" class="form-control" name="email" placeholder="Email Address" required>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label for="password" class="col-md-3 control-label">Password</label>
	                                    <div class="col-md-9">
	                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <!-- Button -->
	                                    <div class="col-md-offset-3 col-md-9">
	                                        <button type="submit" id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
	                                    </div>
	                                </div>

	                            </form>
	                         </div>
	                    </div>




	         </div>
	    </div>

</body>
</html>
