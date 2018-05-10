<?php
  session_start();
	require 'dp.php';
	$pwd = $_POST['password'];
	$fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $email =  $_POST['email'];

	$sql = "INSERT INTO patientlogin(email,password,firstname,lastname) VALUES ('$email','$pwd','$fname','$lname')";

	$res = mysqli_query($con,$sql);

	if(!$res){
      echo "Error Occurred";
      header('location:../html/patientlogin.php');
  } 
  else{
      $_SESSION['pemail']=$email;
      echo "Inserted Successfully";
      header('location:../html/user_form.php');
  }
?>
