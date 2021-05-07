<?php
  session_start();
	require 'dp.php';
	$pwd = $_POST['password'];
	$fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $email =  $_POST['email'];

	$sql = "INSERT INTO doctorlogin(email,password,firstname,lastname) VALUES ('$email','$pwd','$fname','$lname')";

	$res = mysqli_query($con,$sql);
	if(!$res){
      echo "Error Occurred";
      header('location:../html/doctorlogin.php');
  }
  else{
      $_SESSION['demail']=$email;
      echo "Inserted Successfully";
      header('location:../html/doctor_list.php');
  }
?>
