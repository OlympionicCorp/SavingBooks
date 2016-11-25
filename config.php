<?php
	$connessione = mysql_connect("localhost", "root", "");
    if(!$connessione)
      	die('Could not connect: ' . mysql_error());
	$selectdb = mysql_select_db('my_flyingbooks'); 
    if (!$selectdb) {
    	die('Not connected : ' . mysql_error());
	}
?>