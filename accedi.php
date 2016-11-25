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
		padding-top:150px;

    }
	div.access {
              
      border: 2px solid;
      border-radius:5px;
      background-color: #F5F5F5;
      padding: 20px; 
	}
    span{
      	padding-right: 5px;
      }
    </style>
  </head>
  <body>
  <?php
  	session_start();
  	if(isset($_SESSION['username']) || isset($_COOKIE['username']))
    	header("location: http://flyingbooks.altervista.org/profile.php");
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
                </ul>
                <ul class="nav navbar-nav navbar-right">
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
      
      if(!isset($_POST['username'])){
          ?>
         <div class="col-xs-4 col-xs-offset-4 access" >
            <form action="#" method="post">

        		<h1 class="form-signin-heading" align="center">ACCEDI: </h1>
           
              <input type="textfield" name="username" required placeholder="Username" class="form-control"><br>
              <input type="password" name="password" required placeholder="Password" class="form-control"><br>
              <div class="checkbox">
                  <label><input type="checkbox" name="Remember">Rimani connesso</label><br><br>
              </div>
              <button type="submit" class="btn btn-lg btn-primary btn-block">Accedi</button>
            </form> 
            <?php
            if(isset($_GET['notaccess'])){
              ?>
              	<div>
                	<div class="alert alert-danger" role="alert" align="center">Accesso non riuscito.<br>Controlla Username e/o password.</div>
                </div>
              <?php
              }
              }else{
                include "config.php";

                $username = $_POST['username'];
                $password = $_POST['password'];


                $res = mysql_query("SELECT * FROM Registrati WHERE Nickname = '$username' AND Password = '$password'");
                mysql_close($connessione);
                if(mysql_num_rows($res) <= 0){
                  header("location: http://flyingbooks.altervista.org/accedi.php?notaccess=1");
                }else {
                  if(isset($_POST['Remember'])){
                      setcookie("username", $username, time()+3600);
                      header("location: http://flyingbooks.altervista.org/profile.php");
                  }
                  else{
                      session_start();
                      $_SESSION['username'] = $username;
                      $_SESSION['password'] = $password;
                      header("location: http://flyingbooks.altervista.org/profile.php");
                      }
                }

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