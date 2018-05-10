<?php
	
	$con=mysqli_connect("localhost","root","","diseasedb") or die("couldn't to the  server");
	$disease = $_POST['disease'];
	$type = json_decode($_POST['type']);


	$q1 = "select * from disease where dname ='".$disease."'";
	$res = mysqli_query($con,$q1);

	//echo $type;
	if($type == 1){
		while($row = $res->fetch_array())
	    {
	  		echo $row['specialist'];
	  	}
  	}
  	else
  	{
  		while($row = $res->fetch_array())
	    {
	  		echo $row['precaution'];
	  	}
  	}
?>