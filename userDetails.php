<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content=""> -->

    <title>SavingBookSavoia - Annunci libri scolastici usati</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
      body {
          padding-top: 70px;
          padding-bottom: 70px;
          /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
      }
      .tel {
              text-shadow: 2px 2px 5px red;
          }
      th, td {
          padding: 15px;
          text-align: center;
      }
      span{
      	  padding-right: 5px;
	  }
    </style>
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
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav ">
                              <li>
                                  <a href="http://flyingbooks.altervista.org/profile.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><strong><?php echo $userdetails['Nome']." ".$userdetails['Cognome']; ?> </strong></a>
                              </li>
                              <li>
                                  <a href="http://flyingbooks.altervista.org/search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Cerca</a>
                              </li>
                              <li>
                                  <a href="http://flyingbooks.altervista.org/chat.php?from=<?php echo $username; ?>&to=<?php echo $_GET['username']; ?>"><span class="glyphicon glyphicon-send" aria-hidden="true"></span>Contatta</a>
                              </li>
                              <li>
                                  <a href="http://flyingbooks.altervista.org/logout.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Logout</a>
                              </li>
                          </ul>
                    </div>
                  <!-- /.navbar-collapse -->
              </div>
              <!-- /.container -->
          </nav>

        
          <?php
          }else {
      ?>
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
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
                <ul class="nav navbar-nav">
                    <li>
                        <a href="search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Cerca</a>
                    </li>
                    <li>
                        <a href="profile.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Accedi</a>
                    </li>
                    <li>
                        <a href="registrati.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Registrati</a>
                    </li>
                </ul>
             </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <?php
    	}
        ?>
    <div align="center">
      <?php
          if(!isset($_GET['username']))
              echo "<p> Volevi </p>"; 
          else{
              $Username = $_GET['username'];
              $res = mysql_fetch_assoc(mysql_query("SELECT * FROM Registrati where Nickname = '$Username'")); 
              echo "<h1>".$res['Nome']." ".$res['Cognome']."</h1>";
              echo "<h2>Data di nascita: ".$res['DataDiNascita']."</h2>";
              echo "<h2>Residente a: ".$res['Residenza']."</h2>";
              echo "<h2>Email: <i>".$res['Email']."</i></h2>";
              echo "<h2 class=\"tel\">Tel: ".$res['Tel']."</h2>";
              echo "<h2>Articoli Caricati: </h2>";
              $ID = $res['ID'];
              $q = mysql_query("SELECT * FROM Appartiene where IDUser = '$ID'");


              while($k = mysql_fetch_array($q)){
                $idbook = $k['IDBook'];
                $book = mysql_fetch_assoc(mysql_query("SELECT * FROM Articoli where ID = '$idbook'")); 
                $ISBN = $book['CodiceVol'];
                  echo "<hr><table><tr><td><img src=\"http://pictures.abebooks.com/isbn/".$ISBN."-us-300.jpg\"></td>";
                  echo "<td height=\"200\" width=\"450\"><h3>".$book['Titolo']."</h3>";
                  echo "<h4>".$book['Autore']."</h4>";
                  echo "<h4>Materia: ".$book['Materia']."</h4>";
                  echo "<h4>Codice Volume: ".$book['CodiceVol']."</h4>";
                  echo "<h4>Editore: ".$book['Editore']."</h4>";
                  echo "<h4>".$book['IndUsura']."</h4>";
                  echo "<h4>Data aggiunta: ".$book['Data']."</h4>";
                  echo "<h1 style=\"color: red;\">Prezzo: &euro; ".$book['Prezzo']."</h1></td>";
                  ?>
                  <td>
                    <form action="http://flyingbooks.altervista.org/booksDetail.php" method="GET">
                      <button type="submit" class="btn btn-info btn-lg"> 
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        <input type="hidden" value="<?php echo $idbook;?>" name="id">
                      </button>
                    </form>
                  </td>
                  <?php
                  echo "</tr></table>";
               }
              mysql_close($connessione);
          }

      ?>
    </div>
    
    <div class="navbar navbar-default navbar-fixed-bottom">
          <div class="container">
              <p class="navbar-text">Progetto <strong>Classe 5 Info B</strong><br><a href="http://www.itisavoia.ch.it/sito5/">IIS Luigi Di Savoia</a>  </p>
          </div>
      </div>
  </body>
</html>