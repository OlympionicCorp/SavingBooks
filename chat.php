<!-- <!DOCTYPE html>
<html lang="it">
	<head>
    	<meta charset="UTF-8" />
        <title>SavingBookSavoia - Annunci libri scolastici usati</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="./style.css" />
    </head>
    <body>
    	<div class="maincontainer">
        	<div class="header">
            	<div class="head1">
                  	<a href="http://www.linktoplaystore.org"><p>Scarica gratuitamente l'app <strong>SavingBookSavoia</strong></p></a>
                </div>
                <div class="head2">
                	<h1>LOGO SavingBookSavoia</h1>
                </div>
            </div>
            <div>
            	<h2>This is body!!!</h2>
                <a href="search.php"><p> Cerca un Libro </p></a>
                <a href="accedi.php"><p> Accedi </p></a>
                <a href="registrati.php"><p> Registrati </p></a>
            </div>
        </div>
    </body>
</html> -->
<!-- <!DOCTYPE html>
<html lang="it">
	<head>
    	<meta charset="UTF-8" />
        <title>SavingBookSavoia - Annunci libri scolastici usati</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="./style.css" />
    </head>
    <body>
    	<div class="maincontainer">
        	<div class="header">
            	<div class="head1">
                  	<a href="http://www.linktoplaystore.org"><p>Scarica gratuitamente l'app <strong>SavingBookSavoia</strong></p></a>
                </div>
                <div class="head2">
                	<h1>LOGO SavingBookSavoia</h1>
                </div>
            </div>
            <div>
            	<h2>This is body!!!</h2>
                <a href="search.php"><p> Cerca un Libro </p></a>
                <a href="accedi.php"><p> Accedi </p></a>
                <a href="registrati.php"><p> Registrati </p></a>
            </div>
        </div>
    </body>
</html> -->
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
            mysql_close($connessione);
            
          }else {
          header("location: http://flyingbooks.altervista.org/accedi.php");
    	}
    ?>
    <!-- Page Content -->
    <div class="container">

    </div>
    <!-- /.container -->

</body>

</html>