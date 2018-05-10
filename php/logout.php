<?php
	session_start();
	session_destroy();
	header('location:../html/disease_prediction_system.php');
?>
