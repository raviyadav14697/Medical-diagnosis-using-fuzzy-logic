<?php
		include 'dbconnect.php';
		
		if($conn){
			$email=$_POST['email'];
			$pwd=$_POST['password'];
			$_SESSION['error']='false';
			$sql= "SELECT * FROM logindetail WHERE email='$email' and password='$pwd'";
			$result= mysqli_query($conn,$sql);
			$row= mysqli_fetch_assoc($result);
			$count=mysqli_num_rows($result);
			
			if($count==1)
				{
					$_SESSION['suser']=$row['email'];
					$_SESSION['spwd']=$row['password'];
					header("location:   ");
					
				}
			else{	
					$_SESSION['error']='true';	
					header("location:  ");
				}
		}
		else {
			die("connection failed:".mysqli_connect_error());
		}
?>
