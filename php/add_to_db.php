<?php

  require "dp.php";
  $precaution = $_POST['precaution'];
  $specialist = $_POST['specialist'];


  $ar = explode('?',$_POST['str']);

  $dname = strtoupper($ar[0]);
  $did = insertdis($dname,$con, $precaution, $specialist);

  for ($i=1 ; $i<sizeof($ar) ; $i++)
  {
  		$sym = explode('/',$ar[$i]);
  		$sname = strtoupper($sym[0]);
  		$wt = $sym[1];
  		$fv = explode('|',$sym[2]);
      $des = $sym[3];
      $range_value = $sym[4];
  		$sid = checksym($sname,$con);

  		if($sid==-1)
  	    $sid = insert_in_symptoms($sname,$fv[0],$con,$range_value,$des);

  		insert_in_mappings($did,$sid,$fv[1],$wt,$con);
  }


  function insertdis($str,$con,  $precaution, $specialist )
  {
  	$q1 = "Select * from disease where dname='".$str."'";
    $res = mysqli_query($con,$q1);
    $no = mysqli_num_rows($res);

  	if($no==1){
        while($row = $res->fetch_array())
        {
          return $row['did'];
        }
    }

  	$q1 = "Select max(did) as max from disease";
    $res = mysqli_query($con,$q1);
    $no = 0;
    while($row = $res->fetch_array())
    {
      $no = $row['max'] + 1;
    }
  	$query = "Insert into disease (did , dname, specialist, precaution) values('".$no."','".$str."', '".$specialist."', '".$precaution."')";
  	$res = mysqli_query($con,$query);
  	return $no;
  }

  function checksym($sname,$con)
  {
  	$q1 = "Select * from symptom where sname='".$sname."'";
    $res = mysqli_query($con,$q1);
    $no = mysqli_num_rows($res);

  	if($no==0)
  		return -1;

  	while($row = $res->fetch_array())
    {
    	return $row['sid'];
    }
  }

  function insert_in_symptoms($sname,$fv,$con, $range_value, $des)
  {
  	$q1 = "Select * from symptom";
    $res = mysqli_query($con,$q1);
  	$no = mysqli_num_rows($res)+1;
  	$query = "Insert into symptom (sid , sname , fuzzy_set , range_value , Description) values('".$no."','".$sname."','".$fv."','".$range_value."','".$des."')";
  	$res = mysqli_query($con,$query);
  	return $no;
  }

  function insert_in_mappings($did,$sid,$fv,$wt,$con)
  {
  	 $query = "Insert into mapping values('".$did."','".$sid."','".$fv."','".$wt."')";
	   $res = mysqli_query($con,$query);
  }

 ?>
