<?php

  require "dp.php";

  $all_disease = array_of_disease($con);

  function array_of_disease($con)
  {
        $i = 1;
        $output = '<div><table class="table  table-bordered  ">
                <tr>
                     <th >Diseases in database</th>
                     <th >Details</th>
                     <th >Accuracy Testing</th>
                </tr>';
        //$str = '';
        $q1 = "Select * from disease";
        $res = mysqli_query($con,$q1);

        while($row = $res->fetch_array())
        {
            $id = $row['did'];
            //$str = $str.$row['dname'];
            $output .= '<tr><td id='.$row['dname'].'>'.$row['dname'].'</td>
            <td><button class="btn btn-primary" onclick="disease_data(this)" id='.$row['dname'].'>'.$row['dname'].' Details</button></td>
            <td> <a class="btn btn-primary" href="csv_read.php?disease='.$row['dname'].'" id='.$row['dname'].'> Test Accuracy of '.$row['dname'].'</a></td>';
            $i += 1;
        }

        echo $output;
  }
