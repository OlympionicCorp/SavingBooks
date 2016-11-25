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
    span{
    	padding-right: 5px;
    }
    .DocumentList
    {
        overflow-y:hidden;
        padding: 0 15px;
    }
    .list-inline {
      white-space:nowrap;
    }
    .DocumentItem
    {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        margin: 5px;
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
                  <div class="navbar-header ">
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
                          <ul class="nav navbar-nav navbar-left">
                              <li>
                              	<form>
                                   <input type="text" placeholder="Cerca">
                                  </form> 
                              </li>
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
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Cerca</a>
                    </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
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
    <!-- Page Content -->
    <div class="container">

     <div class="jumbotron text-center">


                <h1>LOGO SavingBooks Savoia</h1>
                <p class="lead">Acquista e vendi libri scolastici usati!</p>
                
	</div>
    
    <h1>Libri più visti: </h1>
      <div class="DocumentList">
        <ul class="list-inline">
          <?php
          $res = mysql_query("SELECT * FROM Articoli ORDER BY Views DESC LIMIT 10");
          while($cicle = mysql_fetch_array($res)){
          $id = $cicle['ID'];
          ?>
          <li class = "DocumentItem">
            <?php
            echo "<a href=\"http://flyingbooks.altervista.org/booksDetail.php?id=$id\"><img src=\"http://pictures.abebooks.com/isbn/".$cicle['CodiceVol']."-us-300.jpg\" height=\"210\" width=\"140\"></a>";
            ?>
          </li>
          <?php
          }
          ?>
        </ul>
      </div>
      
       <h1>Libri più recenti: </h1>
      <div class="DocumentList">
        <ul class="list-inline">
          <?php
          $res = mysql_query("SELECT * FROM Articoli ORDER BY Data DESC LIMIT 10");
          while($cicle = mysql_fetch_array($res)){
          $id = $cicle['ID'];
          ?>
          <li class = "DocumentItem">
            <?php
            echo "<a href=\"http://flyingbooks.altervista.org/booksDetail.php?id=$id\"><img src=\"http://pictures.abebooks.com/isbn/".$cicle['CodiceVol']."-us-300.jpg\" height=\"210\" width=\"140\"></a>";
            ?>
          </li>
          <?php
          }
          mysql_close($connessione);
          ?>
        </ul>
      </div>
        <!-- /.row -->
      <div class="navbar navbar-default navbar-fixed-bottom">
          <div class="container">
              <p class="navbar-text">Progetto <strong>Classe 5 Info B</strong><br><a href="http://www.itisavoia.ch.it/sito5/">IIS Luigi Di Savoia</a>  </p>
          </div>
      </div>
    </div>
    <!-- /.container -->

</body>

</html>