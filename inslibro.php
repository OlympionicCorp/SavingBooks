<?php


if(isset($_POST['titolo']) && isset($_POST['autore']) && isset($_POST['editore']) && isset($_POST['materia']) && isset($_POST['isbn']) && isset($_POST['prezzo']) && isset($_POST['indusura']) && isset($_POST['ID'])){
        	include "config.php";
            $ID = $_POST['ID'];
            $titolo = $_POST['titolo'];
            $autore = $_POST['autore'];
            $editore = $_POST['editore'];
            $materia = $_POST['materia'];
            $ISBN = $_POST['isbn'];
            $prezzo = $_POST['prezzo'];
            $indusura = $_POST['indusura'];
            $dat = date("Y-m-d");
        	$ins = mysql_query("INSERT INTO Articoli(Titolo, Autore, Editore, Materia, CodiceVol, Prezzo, IndUsura, Data) VALUES ('$titolo','$autore','$editore','$materia', '$ISBN', '$prezzo','$indusura', '$dat')");
            if($ins){
 
                $idbook = mysql_insert_id();
                echo $idbook['ID'];
            	$res2 = mysql_query("INSERT INTO Appartiene(IDBook, IDUser) VALUES ('$idbook', '$ID')");
            	if($res2){
                	echo "Inserimento riuscito";
                	header("location: http://flyingbooks.altervista.org/profile.php");
                }
            }else{
                echo "volevi ";}
        mysql_close($connessione);
      }
      
      