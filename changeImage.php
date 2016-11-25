<?php
	session_start(); 
    include "config.php";

    if(isset($_SESSION['username']) || isset($_COOKIE['username'])){
      if(isset($_SESSION['username']))
        $username = $_SESSION['username'];
      if(isset($_COOKIE['username']))
        $username = $_COOKIE['username'];
      $res = mysql_query("SELECT * FROM Registrati WHERE Nickname = '$username'");
      $userdetails = mysql_fetch_assoc($res);
      $ID = $userdetails['ID'];
      mysql_close($connessione);
      }else{
      	$message = "Errore di sessione";
      	echo "<script type='text/javascript'>
        		alert('$message');  
        	  	window.location = './accedi.php';
              </script>";
       
      }
      	
?>