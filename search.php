<html>
<head>
	
    <meta charset="UTF-8" />
      <title>Flying Books - Annunci libri scolastici usati</title>
      <!-- <link rel="shortcut icon" href="../favicon.ico"> -->
      <!-- <link rel="stylesheet" type="text/css" href="./style.css" /> -->
      <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style>
        body {
            padding-top: 70px;
            }
        span{
        	padding-right: 5px;
        }
        .col-img{
        	height: 210;
            width: 140;
        }
        .pre-des{
        	width: 700;
        }
      </style>
</head>
<body>
	<div class="maincontainer">
      <?php
          include "config.php";
          session_start();
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
      <div class="body" align="center">
        <div class="container">
          <h1>Cerca libri usati: </h1><br>
             <div class="col-xs-4 col-xs-offset-4 access" >
               <div class="col-xs-6">
                <h3>Cerca per: </h3>
                <select name="search_for" form="search_form" required autofocus class="form-control" id="sel1">
                  <option value="Titolo">Titolo</option>
                  <option value="Autore">Autore</option>
                  <option value="Materia">Materia</option>
                  <option value="CodiceVol">CodiceVolume</option>
                  <option value="Editore">Editore</option>
                </select>
               </div> 
                <div class="col-xs-6">
                  <h3>Ordina per: </h3>
                  <select name="order_for" form="search_form" required autofocus class="form-control" id="sel1">
                    <option value="Prezzo">Prezzo</option>
                    <option value="Data">Data</option>
                  </select>
               </div>
               </div>
               <div class="col-xs-8 col-xs-offset-2 access" >
                  <form action="#" method="GET" id="search_form">
                          <h3>Cerca: </h3>
                          <div class="col-xs-10">
                              <input class="form-control"  type="textfield" name="search_field" required="required" placeholder="Cerca qui...">
                              <input type="hidden" name="page" value="1">
                          </div>
                          <div class="col-xs-2">
                              <button type="submit" class="btn btn-primary btn-md">Cerca</button>
                          </div>
                  </form>
               	</div>
               </div>
             </div>
        <?php
        	if(isset($_GET['search_field'])){
              $str = $_GET['search_field'];
              $search_for_this = $_GET['search_for']; 
              $order_for_this = $_GET['order_for'];
              $page = $_GET['page'];
              $nvis = 5;
              $offset = ($page - 1) * 5;
              $n = mysql_num_rows(mysql_query("SELECT * FROM Articoli WHERE $search_for_this LIKE '%".$str."%' ORDER BY $order_for_this"));
              $sql_query = "SELECT * FROM Articoli WHERE $search_for_this LIKE '%".$str."%' ORDER BY $order_for_this LIMIT 5 OFFSET $offset";
              $res = mysql_query($sql_query, $connessione);
              if(mysql_num_rows($res) > 0)
                echo "<br><h3 align=\"center\">Risultati ricerca per $search_for_this: <strong>$str</strong></h3>";
              else
              	echo "<br><h3 align=\"center\">Nessun risultato trovato per $search_for_this: <strong>$str</strong></h3>";
              mysql_close($connessione);
          }
          ?>
        <table class="table table-bordered">
              <?php
            
            while($cicle=mysql_fetch_array($res)){

              $id = $cicle['ID'];
              ?>
                      <tr>
                      	<td class="col-img">
                        <?php 
                              echo "<img src=\"http://pictures.abebooks.com/isbn/".$cicle['CodiceVol']."-us-300.jpg\" height=\"210\" width=\"140\"></td>"; 
                              echo "<td><div class=\"col-xs-11\"><pre class=\"pre-des\">Data aggiunta: <mark>".$cicle['Data']."</mark>";
                              echo "<br>".$cicle['Titolo']."<br>".$cicle['Autore']."<br>".$cicle['Materia']."<br>".$cicle['CodiceVol']."<br>".$cicle['Editore'];""?><p class="text-primary"><?php echo "&euro; ".$cicle['Prezzo']."</p><br>".$cicle['IndUsura']."</pre></div>";
                        ?>
                        
                      <div class="col-xs-1">
                          <form action="http://flyingbooks.altervista.org/booksDetail.php" method="GET">
                          	<button type="submit" class="btn btn-info btn-lg"> 
                              	<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                <input type="hidden" value="<?php echo $id;?>" name="id">
                          	</button>
                          </form>
                        </div>
          				</td>
                      </tr>
                      <?php
                      }
                      echo "</table>";
                      	if(isset($_GET['search_field']) && ($n > 0)){
                        	echo "<nav aria-label=\"Page navigation\" class=\"text-center\">";
                            echo "<ul class=\"pagination\">";
                            echo "<li>";
                            $page = $_GET['page'];
                            if ($page == 1){
                            	echo "<li class=\"disabled\"><a href=\"#\" aria-label=\"Previous\">";
                                echo "<span aria-hidden=\"true\">&laquo;</span></a></li>";
                			}else{
                            	$i = $page - 1;
                                echo "<a href=\"http://flyingbooks.altervista.org/search.php?search_for=".$search_for_this."&order_for=".$order_for_this."&search_field=".$str."&page=".$i."#\" aria-label=\"Previous\">";
                                echo "<span aria-hidden=\"true\">&laquo;</span></a>";
                            }
                            
                            if($page > 5){
                            	$i = $page - 5;
                            }else{
                            	$i = 1;
                            }
                            $start = $i;
                            $n_pag = floor($n / 5) + 1;
                            while(($i <= $n_pag) && ($i <= $start + 5)){
                            	if($i == $page){
                                	echo "<li class=\"active\"><a href=\"http://flyingbooks.altervista.org/search.php?search_for=".$search_for_this."&order_for=".$order_for_this."&search_field=".$str."&page=".$i."#\">".$i."</a></li>";
                            	}else{
                                echo "<li><a href=\"http://flyingbooks.altervista.org/search.php?search_for=".$search_for_this."&order_for=".$order_for_this."&search_field=".$str."&page=".$i."#\">".$i."</a></li>";
                            	}
                                $i++;
                            }
                            if($i == $start + 5){
                            	echo "<li><a href=\"http://flyingbooks.altervista.org/search.php?search_for=".$search_for_this."&order_for=".$order_for_this."&search_field=".$str."&page=".$n_pag."#\">".$n_pag."</a></li>";
                            }
                            if($page == $n_pag){
                            	echo "<li class=\"disabled\"><a href=\"#\" aria-label=\"Next\">";
                                echo "<span aria-hidden=\"true\">&raquo;</span></a></li>";
                            }else{
                            	$i = $page + 1;
                                echo "<li><a href=\"http://flyingbooks.altervista.org/search.php?search_for=".$search_for_this."&order_for=".$order_for_this."&search_field=".$str."&page=".$i."#\" aria-label=\"Next\">";
                                echo "<span aria-hidden=\"true\">&raquo;</span></a></li>";
                            }
                            echo "</ul></nav>";
          			}
          
          mysql_close($connessione);
          ?>
     </div>
     <div class="navbar navbar-default navbar-bottom">
          <div class="container">
              <p class="navbar-text">Progetto <strong>Classe 5 Info B</strong><br><a href="http://www.itisavoia.ch.it/sito5/">IIS Luigi Di Savoia</a>  </p>
          </div>
      </div>
    </div>
   </div>
</body>
</html>