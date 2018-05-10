<?php

  require "dp.php";
  if(!isset($_POST['str']))
      return;
  $st = explode('|',$_POST['str']);
  $sname = array();
  error_log("Oracle database not available!", 0);

  //key as symptom name,value as index of fuzzy value(0 based indexing)
  $hm = array();
  
  for ($i=0; $i < sizeof($st); $i++) { 
  		
  		$ind = strpos($st[$i], ',');
  		$sname = substr($st[$i],0,$ind);
  		$fv = substr($st[$i],$ind+1,strlen($st[$i]));

      $q2 = "Select * from symptom where sname='".$sname."'";
      $res2 = mysqli_query($con,$q2);
      $fvar=[];
      while($row2 = $res2->fetch_array())
      {
          $fvar = explode(',',$row2['fuzzy_set']);
          $sid  = $row2['sid'];
      }

      for ($j=0; $j < $fvar ; $j++)
      { 
        if($fv == $fvar[$j])
        {
          $hm[$sid]=$j;
          break;
        }
      }
  }

  //file_put_contents('php://stderr', print_r($hm, TRUE));
  $main_arr = all_dis($con,$hm);
  //file_put_contents('php://stderr', print_r($main_arr, TRUE));
  
  //$str = "";
      
  $results = [];

  //defuzzication for each disease!
  foreach ($main_arr as $key => $value) {
        
      $q2 = "Select * from diag";
      $res2 = mysqli_query($con,$q2);
      $num=0;
      $denom=0;
      while($row2 = $res2->fetch_array())
      {
          $yes = $row2['yes'];
          $no = $row2['no'];
          $maybe = $row2['maybe'];
          $x = $row2['x'];

          $fx = $yes*$value[1]+$maybe*$value[2]+$no*$value[3];
          $denom += $fx;
          $num += ($fx*$x);
      }
      //$ci  = centroid of the overall diagnosis decision fuzzy set 
      //$cy = centroid for the Yes fuzzy set 

      $ci = $num/(100*$denom);
      $cy = 0.87; 
	  //echo $ci.'    '.$cy;
      //$per = certainty of presence of the disease di in percent
      $per = ($ci*100)/$cy;
      $results[$key] = $per;

      //echo $key;
      //echo implode(",", $value);
      //$str = "num = ".$num." denom = ".$denom." \n";
      //echo $str;
	  //error_log($str, 0);
      file_put_contents('php://stderr',"Ci === ".$ci."per ==".$per);
      // echo $key." -- >".$per." \n";
  }

  echo json_encode($results);



//Finding the weights of yes,no and may_be 
//for each disease and return the array

function all_dis($con,$hm)
  {
    $main_arr = [];
    $q1 = "Select * from disease";
    $res = mysqli_query($con,$q1);

  	while($row = $res->fetch_array())
    {
      $did = $row['did'];
      //echo $did;
    	
      $q2 = "Select * from mapping where did='".$did."'";
      $res2 = mysqli_query($con,$q2);

      $dis_arr = array('1'=>0,'2'=>0,'3'=>0);
      while($row2 = $res2->fetch_array())
      {
          //echo $row2['sid']+"-";

          $fvar = explode(',',$row2['fv']);
          //echo $fvar[$hm[$row2['sid']]]+"\n";
          $dis_arr[$fvar[$hm[$row2['sid']]]] += $row2['weight'];
                    //1,2,3 -->yes,maybe,no
      }
        //echo "\n";

      $sum = $dis_arr[1]+$dis_arr[2]+$dis_arr[3];

      if($sum!=0){

        $dis_arr[1] /= $sum;
        $dis_arr[2] /= $sum;
        $dis_arr[3] /= $sum;
      }  
      //file_put_contents('php://stderr', print_r($dis_arr, TRUE));
      $main_arr[$row['dname']] = $dis_arr;
    } 
    return $main_arr;
  }
 