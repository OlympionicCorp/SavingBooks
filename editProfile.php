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
        	var nick = document.getElementById("Nickname");
            var nome = document.getElementById("Nome");
            var cognome = document.getElementById("Cognome");
            var data = document.getElementById("DataDiNascita");
            var email = document.getElementById("Email");
            var tel = document.getElementById("Tel");
            var res = document.getElementById("Residenza");
            var cap = document.getElementById("CAP");
            var pass = document.getElementById("Password");
            if(nick.value.length == 0){
            	alert("Inserisci nickname!!!");
                return false;
            }
            if(nome.value.length == 0){
            	alert("Inserisci nome!!!");
                return false;
            }
            if(cognome.value.length == 0){
            	alert("Inserisci cognome!!!");
                return false;
            }
            if(data.value.length == 0){
            	alert("Inserisci data!!!");
                return false;
            }
            if(email.value.length == 0){
            	alert("Inserisci email!!!");
                return false;
            }
            if(tel.value.length == 0){
            	alert("Inserisci il numero di telefono!!!");
                return false;
            }
            if(res.value.length == 0){
            	alert("Inserisci residenza!!!");
                return false;
            }
            if(cap.value.length == 0){
            	alert("Inserisci CAP!!!");
                return false;
            }
            if(pass.value.length == 0){
            	alert("Inserisci una password!!!");
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
      $res = mysql_query("SELECT * FROM Registrati WHERE Nickname = '$username'");
      $userdetails = mysql_fetch_assoc($res);
      if(!isset($_GET['id']))
      	header("location: http://flyingbooks.altervista.org/accedi.php");
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
                    <ul class="nav navbar-nav ">
                      <li>
                        <a href="http://flyingbooks.altervista.org/search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Cerca</a>
                      </li>
                   </ul>
                   <ul class="nav navbar-nav navbar-right">
                      <li>
                        <a href="http://flyingbooks.altervista.org/profile.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><strong><?php echo $userdetails['Nome']." ".$userdetails['Cognome']; ?> </strong></a>
                      </li>
                      <li>
                        <a href="http://flyingbooks.altervista.org/logout.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Logout</a>
                      </li>
                    </ul>
                  </div>
              </div>
          </nav>
          
          <?php
          if(!isset($_POST['Nickname']) || !isset($_POST['Nome']) || !isset($_POST['Cognome']) || !isset($_POST['DataDiNascita']) || !isset($_POST['Email']) || !isset($_POST['Tel']) || !isset($_POST['Residenza']) || !isset($_POST['CAP']) || !isset($_POST['Password'])){
          
          ?>
          
          <div class="col-xs-12">
          	<div class="container">
            <h1 align="center"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Modifica profilo</h1>
              <form name="editform" action="#" role="form" method="POST" onsubmit="return validateForm()">
                <div class="col-xs-12">
                  <div class="col-xs-5">
                      <label style="font-size:27px">Nickname:</label> 
                  </div>
                  <div class="col-xs-7">
                      <input type="text" name="Nickname" id="Nickname" value="<? echo $userdetails['Nickname']; ?>" class="form-control input-lg">
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="col-xs-5">
                      <label style="font-size:27px">Nome:</label> 
                  </div>
                  <div class="col-xs-7">
                      <input type="text" name="Nome" id="Nome" value="<? echo $userdetails['Nome']; ?>" class="form-control input-lg">
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="col-xs-5">
                      <label style="font-size:27px">Cognome:</label> 
                  </div>
                  <div class="col-xs-7">
                      <input type="text" name="Cognome" id="Cognome" value="<? echo $userdetails['Cognome']; ?>" class="form-control input-lg">
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="col-xs-5">
                      <label style="font-size:27px">Data di nascita:</label> 
                  </div>
                  <div class="col-xs-7">
                      <input type="date" name="DataDiNascita" id="DataDiNascita" value="<? echo $userdetails['DataDiNascita']; ?>" class="form-control input-lg">
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="col-xs-5">
                      <label style="font-size:27px">E-Mail:</label> 
                  </div>
                  <div class="col-xs-7">
                      <input type="email" name="Email" id="Email" value="<? echo $userdetails['Email']; ?>" class="form-control input-lg">
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="col-xs-5">
                      <label style="font-size:27px">Telefono:</label> 
                  </div>
                  <div class="col-xs-7">
                      <input type="text" name="Tel" id="Tel" value="<? echo $userdetails['Tel']; ?>" class="form-control input-lg">
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="col-xs-5">
                      <label style="font-size:27px">Residenza:</label> 
                  </div>
                  <div class="col-xs-7">
                      <input type="text" name="Residenza" id="Residenza" value="<? echo $userdetails['Residenza']; ?>" class="form-control input-lg">
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="col-xs-5">
                      <label style="font-size:27px">CAP:</label> 
                  </div>
                  <div class="col-xs-7">
                      <input type="text" name="CAP" id="CAP" value="<? echo $userdetails['CAP']; ?>" class="form-control input-lg">
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="col-xs-5">
                      <label style="font-size:27px">Password:</label> 
                  </div>
                  <div class="col-xs-7">
                      <input type="password" name="Password" id="Password" value="<? echo $userdetails['Password']; ?>" class="form-control input-lg">
                  </div>
                </div>
                <div class="col-xs-12">
                	<div class="col-xs-4 col-xs-offset-4">
                      <button type="submit" class="btn btn-warning btn-block btn-lg">
                          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
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
            $nick = $_POST['Nickname'];
            if($_POST['Nickname'] != $userdetails['Nickname']){
              if(mysql_num_rows(mysql_query("SELECT * FROM Registrati WHERE Nickname = '$nick'")) > 0)
                  echo "<SCRIPT LANGUAGE='JavaScript'>
                          window.alert('Nickname esistente')
                          window.location.href='http://flyingbooks.altervista.org/editProfile.php?id=".$userdetails['ID']."';
                          </SCRIPT>";
            }else if(validateDate($_POST['DataDiNascita'])){
              echo "<SCRIPT LANGUAGE='JavaScript'>
              			window.alert('Data non valida')
                        window.location.href='http://flyingbooks.altervista.org/editProfile.php?id=".$userdetails['ID']."';
                        </SCRIPT>";
            }else if(!is_numeric($_POST['Tel'])){
              echo "<SCRIPT LANGUAGE='JavaScript'>
              			window.alert('Numero di telefono non valido')
                        window.location.href='http://flyingbooks.altervista.org/editProfile.php?id=".$userdetails['ID']."';
                        </SCRIPT>";
            }else if(!is_numeric($_POST['CAP'])){
              echo "<SCRIPT LANGUAGE='JavaScript'>
              			window.alert('CAP non valido')
                        window.location.href='http://flyingbooks.altervista.org/editProfile.php?id=".$userdetails['ID']."';
                        </SCRIPT>";
            }else if(strlen($_POST['Password']) < 5){
              echo "<SCRIPT LANGUAGE='JavaScript'>
              			window.alert('La password deve contenere almeno 5 caratteri')
                        window.location.href='http://flyingbooks.altervista.org/editProfile.php?id=".$userdetails['ID']."';
                        </SCRIPT>";
            }else{
            	$nick = $_POST['Nickname'];
                $nome = $_POST['Nome'];
                $cognome = $_POST['Cognome'];
                $data = $_POST['DataDiNascita'];
                $email = $_POST['Email'];
                $tel = $_POST['Tel'];
                $res = $_POST['Residenza'];
                $CAP = $_POST['CAP'];
                $pass = $_POST['Password'];
                $id = $_GET['id'];
                if($nick == $userdetails['Nickname'] && $nome == $userdetails['Nome'] && $cognome == $userdetails['Cognome'] && $data == $userdetails['DataDiNascita'] && $email == $userdetails['Email'] && $tel == $userdetails['Tel'] && $res == $userdetails['Residenza'] && $CAP == $userdetails['CAP'] && $pass == $userdetails['Password']){
                  echo "<SCRIPT LANGUAGE='JavaScript'>
                          window.alert('Non hai modificato nessun valore')
                          window.location.href='http://flyingbooks.altervista.org/editProfile.php?id=".$userdetails['ID']."';
                          </SCRIPT>";
                  }else{
                  	if(mysql_query("UPDATE Registrati
                                  	SET
                                      Nickname = '$nick',
                                      Nome = '$nome',
                                      Cognome = '$cognome',
                                      DataDiNascita = '$data',
                                      Email = '$email',
                                      Tel = '$tel',
                                      Residenza = '$res',
                                      CAP = '$CAP',
                                      Password = '$pass'
                                  	WHERE ID = $id"))
                      echo "<h1 align='center'>Dati modificati<br><a href='http://flyingbooks.altervista.org/profile.php'>Torna sul profilo</a></h1>";
                      else  echo "<h1 align='center'>Errore<br>".mysql_error()."<br>Non è stato possibile aggiornare i dati<br><a href='http://flyingbooks.altervista.org/profile.php'>Torna sul profilo</a></h1>";
            	}
            }
            mysql_close($connessione);
          }
          
          function validateDate($date)
          {
            $d = DateTime::createFromFormat('d-m-Y', $date);
            return $d && $d->format('d-m-Y') === $date;
          }
          ?>
      <!-- <div class="navbar navbar-default navbar-fixed-bottom">
          <div class="container">
              <p class="navbar-text">Progetto <strong>Classe 5 Info B</strong><br><a href="http://www.itisavoia.ch.it/sito5/">IIS Luigi Di Savoia</a></p>
          </div>
      </div> -->
  </body>
</html>