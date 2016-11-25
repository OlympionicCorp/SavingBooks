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
    </style>
</head>

<body>
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
    session_start();
    session_destroy();
    setcookie("username","",time()-3600);
    echo '<h1 align="center">Sei stato disconnesso</h1>';
    header("refresh:5; url=http://flyingbooks.altervista.org/");
  ?>
	<div class="navbar navbar-default navbar-fixed-bottom">
          <div class="container">
              <p class="navbar-text">Progetto <strong>Classe 5 Info B</strong><br><a href="http://www.itisavoia.ch.it/sito5/">IIS Luigi Di Savoia</a>  </p>
          </div>
      </div>

</body>

</html>