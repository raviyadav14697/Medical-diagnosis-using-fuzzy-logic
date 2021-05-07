<?php

  require "dp.php";

  $all_syms = array_of_syms($con);

  function array_of_syms($con)
  {
          $str = '';
          $q1 = "Select * from symptom";
        $res = mysqli_query($con,$q1);

        while($row = $res->fetch_array())
        {
            $id = $row['sid'];
            $str = $str.$row['sname'].','.$row['fuzzy_set'].'|';
        }

        echo substr($str,0,strlen($str)-1);
  }
