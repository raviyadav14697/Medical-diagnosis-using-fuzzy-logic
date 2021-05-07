<?php
		session_start();
		require 'dp.php';
		if($con){
			$email=$_POST['email'];
			$pwd=$_POST['password'];
			$sql= "SELECT * FROM doctorlogin WHERE email='$email' and password='$pwd'";
			$result= mysqli_query($con,$sql);
			$count=mysqli_num_rows($result);

			if($count==1)
			{
				$_SESSION['demail']=$email;
				header("location:../html/doctor_list.php");

			}
			else
			{
				
					echo "wrong username or password";
					header("location:../html/doctorlogin.php");
			}
		}
		else {
			die("connection failed:".mysqli_connect_error());
		}
?>
