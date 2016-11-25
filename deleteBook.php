<?php
	if(isset($_SESSION['username']) || isset($_COOKIE['username'])){
		include 'config.php';
        if(isset($_GET['id'])){
        	$q1 = mysql_
        }else
        	header("location: http://flyingbooks.altervista.org/profile.php");
    }else
    	header("location: http://flyingbooks.altervista.org/accedi.php");
?>