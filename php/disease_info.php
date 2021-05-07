<?php

    $con=mysqli_connect("localhost","root","","diseasedb") or die("couldn't to the  server");
    $disease = $_POST['disease'];
    $q1 = "select did from disease where dname ='".$disease."'";
    $res = mysqli_query($con,$q1);
    $no = mysqli_num_rows($res);
    $did = '';
    while($row = $res->fetch_array())
    {
        $did = $row['did'];
    }
    $q1 = "select did,s.sid,sname,weight,fuzzy_set,range_value,fv from mapping as m, symptom as s where s.sid = m.sid and did ='".$did."'";
    $res = mysqli_query($con,$q1);
    $no = mysqli_num_rows($res);
    $str = '';
    while($row = $res->fetch_array())
    {
        $str .= $row['did']."|".$row['sid']."|".$row['sname']."|".$row['weight']."|".$row['fuzzy_set']."|".$row['range_value']."|".$row['fv'].'/';
    }
    echo $str;
?>
