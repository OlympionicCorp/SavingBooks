<html>
  <head>
      <meta charset="UTF-8" />
      <title>Flying Books - Annunci libri scolastici usati</title>
      <!-- <link rel="shortcut icon" href="../favicon.ico"> -->
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    body {
        padding-top: 70px;
        padding-bottom: 70px;
       	}
    th, td {
    	padding: 10px;
	}
    span{
    	padding-right: 5px;
    }
    </style>
    <script>
      function validateForm() {
      	  var cod = document.getElementById("isbn");
          var cod2 = document.getElementById("prezzo")
          if(cod.value.length != 13 || isNaN(cod.value))
          {	
              alert("isbn non valido");
              return false;
          }else if(!isPrezzo(cod2.value))
          {
          	  alert("prezzo non valido");
              return false;
          }
      };
      
      function isPrezzo(prezzo) {
      	  if(!isNaN(prezzo)){
          	prezzo += ".00"
          }
          else{
            if(prezzo.length < 4)	return false;
            for(var x = 0; x < prezzo.length; x++){
                if(x == prezzo.length - 3){
                    if(charAt(x) != '.'){
                        return false;
                    }else if(charAt(x) == ','){
                        charAt(x) = '.';
                }else if(isNaN(charAt(x))){
                        return false;
                    }
            }
          }
          return true;
      };
  </script>
  </head>
  <body>
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
            ?>
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
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav ">
                              <li>
                                  <a href="http://flyingbooks.altervista.org/search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Cerca</a>
                              </li>
                          </ul>
                          <ul class="nav navbar-nav navbar-right">
                              <li>
                                  <a href="http://flyingbooks.altervista.org/editProfile.php?id=<?php echo $ID?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Modifica profilo</a>
                              </li>
                          </ul>
                    </div>
                  <!-- /.navbar-collapse -->
              </div>
              <!-- /.container -->
          </nav>
            <div class="container">
              <br>
              <br>
                  <div class="row" id="main">
                      <div class="col-xs-4 well" id="leftPanel">
                          <div class="row">
                              <div class="col-xs-12">
                                  <div>
                                      <img src="/images/profile.png" class="img-circle img-thumbnail">
                                      <h2>
                                        <?php echo $userdetails['Nome']." ".$userdetails['Cognome'];?> 
                                      </h2>
                                      <h4><?php echo "Nickname: ".$userdetails['Nickname'];?></h4>
                                      <p><?php echo $userdetails['Residenza'];?></p>
                                      <form action="logout.php" method="post">
                                          <button type="submit" class="btn btn-warning">
                                          	  <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                              Esci
                                          </button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xs-8 well" id="rightPanel">
                      	<div class="row">
                                <div class="col-xs-12">
                                  <?php
                                      $q1 = mysql_query("SELECT * FROM Appartiene where IDUser = '$ID'");
                                      echo "<h1>I tuoi libri: </h1><table>";
                                      if(mysql_num_rows($q1) == 0){
                                          echo "<h4>Nessun libro inserito</h4>";
                                      }
                                      while($articolo = mysql_fetch_array($q1)){
                                          $idbook = $articolo['IDBook'];
                                          $book = mysql_fetch_assoc(mysql_query("SELECT * FROM Articoli where ID = '$idbook'")); 
                                          $ISBN = $book['CodiceVol'];
                                          echo "<tr>";
                                          echo "<td><span class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></span></td><td><a href=\"http://flyingbooks.altervista.org/booksDetail.php?id=$idbook\">".$book['Titolo']."<a></td>";
                                          echo "<td>Data aggiunta: ".$book['Data']."</td>";
                                          ?>
                                          <td>
                                            <div class="col-xs-12">
                                              <div class="col-xs-6">
                                                <form action="http://flyingbooks.altervista.org/editBook.php" method="GET">
                                                  <button type="submit" class="btn btn-default" aria-label="Left Align">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    <input type="hidden" value="<?php echo $idbook;?>" name="id">
                                                  </button>
                                                </form>
                                              </div>
                                              <div class="col-xs-6">
                                                <form action="http://flyingbooks.altervista.org/deleteBook.php" method="GET">
                                                  <button type="submit" class="btn btn-default" aria-label="Left Align">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                    <input type="hidden" value="<?php echo $idbook;?>" name="id">
                                                  </button>
                                                </form>
                                              </div>
                                            </div>
                                          </td>
                                          <?php
                                          echo "</tr>";
                                       }
                                       echo "</table>";
                                       mysql_close($connessione);
                                  ?>
                                </div>
                           </div>
                           <div class="row">
                            <div class="col-xs-12">
                                <form name="insform" role="form" action="inslibro.php" method="POST" onsubmit="return validateForm()">
                                    <h2>Inserisci un libro</h2>
                                    <hr class="colorgraph">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="titolo" class="form-control input-lg" placeholder="Titolo" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="autore" class="form-control input-lg" placeholder="Autore" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="editore" class="form-control input-lg" placeholder="Editore" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="materia" class="form-control input-lg" placeholder="Materia" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="indusura" class="form-control input-lg" placeholder="Descrizione" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="isbn" id="isbn" class="form-control input-lg" placeholder="Codice ISBN" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="prezzo" id="prezzo" class="form-control input-lg" placeholder="Prezzo euro Es. 12.90" required>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="<? echo $ID;?>" name="ID">
                                    <hr class="colorgraph">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6"></div>
                                        <div class="col-xs-12 col-md-6"><button id="control-error" type="submit" class="btn btn-success btn-block btn-lg">Inserisci</button></div>
                                    </div>
                                </form>
                        </div>
                      </div>
              </div>
            <?php
        }else 
        	header("location: http://flyingbooks.altervista.org/accedi.php");
   	?>
    <div class="navbar navbar-default navbar-fixed-bottom">
          <div class="container">
              <p class="navbar-text">Progetto <strong>Classe 5 Info B</strong><br><a href="http://www.itisavoia.ch.it/sito5/">IIS Luigi Di Savoia</a>  </p>
          </div>
      </div>
      
  </body>
</html>