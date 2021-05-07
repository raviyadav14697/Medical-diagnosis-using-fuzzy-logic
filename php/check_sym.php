<?php

  require "dp.php";

  $sym = strtoupper($_POST['str']);
  check_sym($sym,$con);

  function check_sym($sname,$con)
  {
    	$q1 = "Select * from symptom where sname='".$sname."'";
      $res = mysqli_query($con,$q1);
      $no = mysqli_num_rows($res);

    	if($no==0)
    	{
    		echo -1;
    		exit();
    	}

    	$id = -1;
    	while($row = $res->fetch_array())
      {
      	echo $row['fuzzy_set'];
      }
   }
?>
