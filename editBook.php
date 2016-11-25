<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <title>SavingBookSavoia - Annunci libri scolastici usati</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <style>
      body {
          padding-top: 70px;
          padding-bottom: 100px;
      }
      .tel {
              text-shadow: 2px 2px 5px red;
          }
      th, td {
          padding: 15px;
          text-align: center;
      }
      div.col-xs-12{
      	padding: 12px;
      }
      span{
      	padding-right: 5px;
      }
    </style>
    <script type='text/javascript'>
    	function validateForm(){
        	var titolo = document.getElementById("Titolo");
            var autore = document.getElementById("Autore");
            var materia = document.getElementById("Materia");
            var codice = document.getElementById("CodiceVol");
            var editore = document.getElementById("Editore");
            var prezzo = document.getElementById("Prezzo");
            var descr = document.getElementById("IndUsura");
            if(titolo.value.length == 0){
            	alert("Inserisci titolo!!!");
                return false;
            }
            if(autore.value.length == 0){
            	alert("Inserisci autore!!!");
                return false;
            }
            if(materia.value.length == 0){
            	alert("Inserisci materia!!!");
                return false;
            }
            if(codice.value.length == 0){
            	alert("Inserisci ISBN!!!");
                return false;
            }
            if(editore.value.length == 0){
            	alert("Inserisci editore!!!");
                return false;
            }
            if(prezzo.value.length == 0){
            	alert("Inserisci il prezzo!!!");
                return false;
            }
            if(descr.value.length == 0){
            	alert("Inserisci una descrizione!!!");
                return false;
            }
        };
    </script>
</head>
<body>
<?php
	session_start();
    include 'config.php';
	if(isset($_SESSION['username']) || isset($_COOKIE['username'])){
      if(isset($_SESSION['username']))
        $username = $_SESSION['username'];
      if(isset($_COOKIE['username']))
        $username = $_COOKIE['username'];
      $userres = mysql_query("SELECT * FROM Registrati WHERE Nickname = '$username'");
      $userdetails = mysql_fetch_assoc($userres);
      if(!isset($_GET['id']))
      	header("location: http://flyingbooks.altervista.org/accedi.php");
      else{
      	$bookid = $_GET['id'];
      	$bookres = mysql_query("SELECT * FROM Articoli WHERE ID = '$bookid'");
        $bookdetails = mysql_fetch_assoc($bookres);
      }
    }else
      header("location: http://flyingbooks.altervista.org/accedi.php");
          ?>
          <!-- Navigation -->
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
              <div class="container">
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="http://flyingbooks.altervista.org/">SavingBooks Savoia</a>
                  </div>
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                          	  <li>
                                  <a href="search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Cerca</a>
                              </li>
                          </ul>
                          <ul class="nav navbar-nav navbar-right">
                              <li>
                                  <a href="profile.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><strong><?php echo $userdetails['Nome']." ".$userdetails['Cognome']; ?> </strong></a>
                              </li>
                              <li>
                                  <a href="logout.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Esci</a>
                              </li>
                          </ul>
                  </div>
              </div>
          </nav>
          
          <?php
         	
          if(!isset($_POST['Titolo']) || !isset($_POST['Autore']) || !isset($_POST['Materia']) || !isset($_POST['CodiceVol']) || !isset($_POST['Editore']) || !isset($_POST['Prezzo']) || !isset($_POST['IndUsura'])){
          	
          ?>
          
          <div class="col-xs-12">
          	<div class="container">
            <h1 align="center"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Modifica dati libro</h1>
              <form name="editform" action="#" role="form" method="POST" onsubmit="return validateForm()">
                <div class="col-xs-12">
                  <div class="col-xs-5">
                      <label style="font-size:27px">Titolo:</label> 
                  </div>
                  <div class="col-xs-7">
                      <input type="text" name="Titolo" id="Titolo" value="<? echo $bookdetails['Titolo']; ?>" class="form-control input-lg">
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="col-xs-5">
                      <label style="font-size:27px">Autore:</label> 
                  </div>
                  <div class="col-xs-7">
                      <input type="text" name="Autore" id="Autore" value="<? echo $bookdetails['Autore']; ?>" class="form-control input-lg">
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="col-xs-5">
                      <label style="font-size:27px">Materia:</label> 
                  </div>
                  <div class="col-xs-7">
                      <input type="text" name="Materia" id="Materia" value="<? echo $bookdetails['Materia']; ?>" class="form-control input-lg">
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="col-xs-5">
                      <label style="font-size:27px">Codice Volume ISBN:</label> 
                  </div>
                  <div class="col-xs-7">
                      <input type="text" name="CodiceVol" id="CodiceVol" value="<? echo $bookdetails['CodiceVol']; ?>" class="form-control input-lg">
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="col-xs-5">
                      <label style="font-size:27px">Editore:</label> 
                  </div>
                  <div class="col-xs-7">
                      <input type="text" name="Editore" id="Editore" value="<? echo $bookdetails['Editore']; ?>" class="form-control input-lg">
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="col-xs-5">
                      <label style="font-size:27px">Prezzo:</label> 
                  </div>
                  <div class="col-xs-7">
                      <input type="number" step="any" min="0" name="Prezzo" id="Prezzo" value="<? echo $bookdetails['Prezzo']; ?>" class="form-control input-lg">
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="col-xs-5">
                      <label style="font-size:27px">Descrizione:</label> 
                  </div>
                  <div class="col-xs-7">
                      <input type="text" name="IndUsura" id="IndUsura" value="<? echo $bookdetails['IndUsura']; ?>" class="form-control input-lg">
                  </div>
                </div>
                <div class="col-xs-12">
                	<div class="col-xs-4 col-xs-offset-4">
                      <button type="submit" class="btn btn-warning btn-block btn-lg">
                          <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                          Modifica
                      </button>
                    </div>
                 </div>
              </form>
            </div>
          </div>
          
          <?php
          }else{
          	//control and insert data
            if(is_nan($_POST['CodiceVol']) || strlen($_POST['CodiceVol']) != 13){
              echo "<SCRIPT LANGUAGE='JavaScript'>
              			window.alert('Codice ISBN non valido')
                        window.location.href='http://flyingbooks.altervista.org/editBook.php?id=".$bookdetails['ID']."';
                        </SCRIPT>";
            }else if(!is_numeric($_POST['Prezzo'])){
              echo "<SCRIPT LANGUAGE='JavaScript'>
              			window.alert('Prezzo non valido')
                        window.location.href='http://flyingbooks.altervista.org/editBook.php?id=".$bookdetails['ID']."';
                        </SCRIPT>";
            }else{
            	$titolo = $_POST['Titolo'];
                $autore = $_POST['Autore'];
                $materia = $_POST['Materia'];
                $isbn = $_POST['CodiceVol'];
                $editore = $_POST['Editore'];
                $prezzo = $_POST['Prezzo'];
                $desc = $_POST['IndUsura'];
                $id = $_GET['id'];
                if($titolo == $bookdetails['Titolo'] && $autore == $bookdetails['Autore'] && $materia == $bookdetails['Materia'] && $isbn == $bookdetails['CodiceVol'] && $editore == $bookdetails['Editore'] && $prezzo == $bookdetails['Prezzo'] && $desc == $bookdetails['IndUsura']){
                  echo "<SCRIPT LANGUAGE='JavaScript'>
                          window.alert('Non hai modificato nessun valore')
                          window.location.href='http://flyingbooks.altervista.org/editProfile.php?id=".$userdetails['ID']."';
                          </SCRIPT>";
                  }else{
                  	if(mysql_query("UPDATE Articoli
                                  	SET
                                      Titolo = '$titolo',
                                      Autore = '$autore',
                                      Materia = '$materia',
                                      CodiceVol = '$isbn',
                                      Editore = '$editore',
                                      Prezzo = '$prezzo',
                                      IndUsura = '$desc'
                                  	WHERE ID = $id"))
                      echo "<h1 align='center'>Dati modificati<br><a href='http://flyingbooks.altervista.org/profile.php'>Torna sul profilo</a></h1>";
                      else  echo "<h1 align='center'>Errore<br>".mysql_error()."<br>Non è stato possibile aggiornare i dati<br><a href='http://flyingbooks.altervista.org/profile.php'>Torna sul profilo</a></h1>";
            	}
            }
            mysql_close($connessione);
          }
          
          ?>
      <!-- <div class="navbar navbar-default navbar-fixed-bottom">
          <div class="container">
              <p class="navbar-text">Progetto <strong>Classe 5 Info B</strong><br><a href="http://www.itisavoia.ch.it/sito5/">IIS Luigi Di Savoia</a></p>
          </div>
      </div> -->
  </body>
</html>