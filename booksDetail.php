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
      th, td {
          padding: 15px;
          text-align: left;
      }
      h1.price {
              text-shadow: 2px 2px 5px red;
          }
      span{
      	padding-right: 5px;
      }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                                  <a href="profile.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><strong><?php echo $userdetails['Nome']." ".$userdetails['Cognome']; ?> </strong></a>
                              </li>
                              <li>
                                  <a href="search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Cerca</a>
                              </li>
                              <li>
                                  <a href="logout.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Esci</a>
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
    <div class="container">
      <div align="center">
      <?php
      
        if(!isset($_GET['id']))
            header("location: http://flyingbooks.altervista.org/search.php");
        else{
            $ID = $_GET['id'];
            $cicle = mysql_fetch_assoc(mysql_query("SELECT * FROM Articoli where ID = '$ID'")); 
            $views = $cicle['Views'] + 1;
			mysql_query("UPDATE Articoli SET Views = '$views' WHERE ID = '$ID'");
            
            echo "<table><tr><td><img src=\"http://pictures.abebooks.com/isbn/".$cicle['CodiceVol']."-us-300.jpg\" height=\"210\" width=\"140\" style=\"vertical-align:middle\"></td>"; 
            echo "<td><h1>".$cicle['Titolo']."</h1>";
            echo "<h3>".$cicle['Autore']."</h3>";
            echo "<h4>Materia: ".$cicle['Materia']."</h4>";
            echo "<h4>Codice Volume: ".$cicle['CodiceVol']."</h4>";
            echo "<h4>Editore: ".$cicle['Editore']."</h4>";
            echo "<h4>".$cicle['IndUsura']."</h4>";
            echo "<h4>Data aggiunta: ".$cicle['Data']."</h4>";
            echo "<h1 class=\"price\">Prezzo: &euro; ".$cicle['Prezzo']."</h1></td></tr></table>";
            $idres = $cicle['IdUser'];

            $user = mysql_fetch_assoc(mysql_query("SELECT * FROM Registrati where ID = '$idres'"));
            $usernamek = $user['Nickname'];
            echo "<hr><h2>Proprietario: <a href=\"http://flyingbooks.altervista.org/userDetails.php?username=$usernamek\">".$user['Nome']." ".$user['Cognome']."</a></h2>";
            echo "<h3>Luogo: ".$user['Residenza']."<br>CAP ".$user['CAP']."</h2>";
            echo "<h3>Contatta al ".$user['Tel']."</h2>";
            mysql_close($connessione);
        }
    ?>
      </div>
      <div class="navbar navbar-default navbar-fixed-bottom">
            <div class="container">
                <p class="navbar-text">Progetto <strong>Classe 5 Info B</strong><br><a href="http://www.itisavoia.ch.it/sito5/">IIS Luigi Di Savoia</a>  </p>
            </div>
        </div>
      </div>
  </body>
</html>