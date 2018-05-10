<?php
		session_start();
		require 'dp.php';
		if($con){
			$email=$_POST['email'];
			$pwd=$_POST['password'];
			$sql= "SELECT * FROM patientlogin WHERE email='$email' and password='$pwd'";
			$result= mysqli_query($con,$sql);
			$count=mysqli_num_rows($result);

			if($count==1)
			{
				$_SESSION['pemail']=$email;
				header("location:../html/user_form.php");

			}
			else{
					echo "wrong username or password";
					header("location:../html/patientlogin.php");
				}
		}
		else {
			die("connection failed:".mysqli_connect_error());
		}
?>
