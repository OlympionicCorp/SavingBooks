<html>
<head>
	<meta charset="UTF-8" />
	<title> Registrati </title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
    body {
		padding-top:80px;
    }
	div.reg {       
      border: 2px solid;
      border-radius:5px;
      background-color: #F5F5F5;
      padding: 20px; 
	}
    span{
      	padding-right: 5px;
      }
      
    input.search {
    	background-color: grey;
        color: white;
        border: grey;
        padding-right: 50px;
    }
    
    button.search {
    	background-color: grey;
        border: grey;
        color: black;
    }
    </style>
</head>
<body>
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
          <!--<ul class="nav navbar-nav ">
            <li>
              <a href="search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Cerca</a>
            </li>
          </ul>-->
          <div class="col-sm-3 col-md-3">
        	<form class="navbar-form" role="search">
        		<div class="input-group input-group-sm">
                	<input type="text" class="form-control search" placeholder="Cerca" name="q" >
                    <div class="input-group-btn">
                    	<button class="btn btn-default search" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                		<!--<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>-->
            		</div>
        		</div>
        	</form>
    </div>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="accedi.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Accedi</a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>

	<?php
		include "config.php";
        
        if(!isset($_POST['name'])){
    ?>
          
    <div class="col-xs-4 col-md-offset-4 reg" align="center">
        <table width="100%">
            <form action="#" method="POST" >
                <th colspan="2" align="center">
                	<h1 class="form-signin-heading" align="center">Registrati: </h1>
                </th>
				<!--<tr>
                	<td>
                		<p> ID: <input type="number" name="id" size="7" required="required"> </p>
                    <td>    
                </tr>-->
                <tr>
                	<td>
                        <div class="col-xs-11" style="padding: 10px;">
                        	<?php
                         		if($_GET['LenErrorUsr'])
                                		echo "<p><strong>L'username deve essere di almeno 5 caratteri.</strong></p>";
                            ?>
                            <div style="padding: 5px;">	
                                <input placeholder="Username" class="form-control" type="textfield" name="username" size="30" required>
                            </div>
                            <?php
                            	if($_GET['LenErrorPass'])
                                		echo "<p><strong>La password deve essere lunga almeno 5 caratteri.</strong></p>";
                            ?>
                            <div style="padding: 5px;">
                        		<input placeholder="Password" class="form-control" type="password" name="password" size="20" required>
                            </div>
                      	</div>  
                	</td>
                	<td>
                      	<div class="col-xs-11" style="padding: 10px;">
                        	<?php
                            	if($_GET['NumErrorName'])
                                	echo "<p><strong>Il nome può contenere solo lettere.</strong></p>";		
                            ?>
                		   	<div style="padding: 5px;">	
                                <input placeholder="Nome" class="form-control" type="textfield" name="name" size="20" required="required">
                            </div>
                            <?php
                            	if($_GET['NumErrorSur'])
                                	echo "<p><strong>Il cognome può contenere solo lettere.</strong></p>";		
                            ?>
                            <div style="padding: 5px;">
                            	<input placeholder="Cognome" class="form-control" type="textfield" name="surname" size="30" required>
                            </div>
                            <?php
                            	if($_GET['FormatDateErr'])
                                	echo "<p><strong>La data deve essere in formato YYYY-MM-DD.</strong></p>";		
                            ?>
                        	<div style="padding: 5px;">
                            	<input placeholder="Data di nascita" class="form-control" type="date" name="date" placeholder="2016-11-15" required> 
                            </div>
                        </div> 
                  	</td>
                </tr>
                <tr>
                	<td>
                     	<div class="col-xs-11" style="padding: 10px;">
                        <?php
                            if($_GET['LenErrorTel'])
                                    echo "<p><strong>Il numero di telefono deve avere 10 caratteri.</strong></p>";
                            if($_GET['TypeErrorTel'])
                            		echo "<p><strong> Il numero di telefono deve essere numerico.</strong></p>";
                        ?>
                        	<div style="padding: 5px;">
                        		<input placeholder="Numero di telefono" class="form-control" type="textfield" name="tel" size="11" required>
                            </div>
                            <div style="padding: 5px;">
                            	<input placeholder="Email" class="form-control" type="email" name="mail" size="30" required>
                            </div>    
                        </div>	
                	</td>
                	<td>
                    	<div class="col-xs-11" style="padding: 10px;">
                        	<?php
                            	if($_GET['NumErrorRes'])
                                	echo "<p><strong>La residenza può contenere solo lettere.</strong></p>";		
                            ?>
                			<div style="padding: 5px;">
                            	<input placeholder="Residenza" class="form-control" type="textfield" name="res" size="20" required>
                            </div>
                            <?php
                            	if($_GET['TypeErrorCap'])
                                    	echo "<p><strong>Il cap deve essere numerico.</strong></p>";
                            	if($_GET['LenErrorCap'])
                                		echo "<p><strong>Il cap deve essere lungo 5 caratteri.</strong></p>";
                            ?>
                            <div style="padding: 5px;">
                            	<input placeholder="CAP"class="form-control" type="textfield" name="cap" size="6" required>
                            </div>    
                        </div>
                  	</td>
                </tr>
                <tr>
                	<td colspan="2" align="center">
                    	<div class="col-xs-11">
                    		<input type="submit" class="btn btn-primary btn-md" value="Registrati" data-toggle="modal" data-target="#ErrModal">
                            <button type="reset" class="btn btn-primary btn-md" value="Reset">Reset</button>
                        </div>
                  	</td>
				</tr>    
            </form>
		</table>
    </div>
    <?php
    	}
        else{   
        
        	$User = $_POST['username'];
			$Pass = $_POST['password'];
			$Name = $_POST['name'];
			$Surname = $_POST['surname'];
			$Date = $_POST['date'];
			$Mail = $_POST['mail'];
			$Tel = $_POST['tel'];
			$Res = $_POST['res'];
			$Cap = $_POST['cap'];
            
            $TypeErrorCap;
            $TypeErrorTel;
            
            $LenErrorCap;
            $LenErrorTel;
            $LenErrorPass;
            $LenErrorUsr;
            
            $NumErrorName;
            $NumErrorSur;
            $NumErrorRes;
            
            $FormatDateErr;
            
			$UrlError = "";
            
			if(!is_numeric($Cap))
           		$UrlError .= "TypeErrorCap=true";
			if(strlen($Cap) != 5)
				$UrlError .= "&LenErrorCap=true";
			
			if(strlen($Tel) != 10)
                $UrlError .= "&LenErrorTel=true";
            if(!is_numeric($Tel))
            	$UrlError .= "&TypeErrorTel=true";
			
            if(strlen($Pass) < 5)
            	$UrlError .= "&LenErrorPass=true";
            
			if(strlen($User) < 5)
            	$UrlError .= "&LenErrorUsr=true";

            if(preg_match('/[^a-zA-Z]+/', $Name) == 1)
                $UrlError .= "&NumErrorName=true";

            if(preg_match('/[^a-zA-Z]+/', $Surname) == 1)
                $UrlError .= "&NumErrorSur=true";            
			
			if(preg_match('/[^a-zA-Z]+/', $Res) == 1)
                $UrlError .= "&NumErrorRes=true";
                
            /*if(!$dt)
            	$UrlError .= "&FormatDateErr=true";*/
            
            
            
			if(strlen($UrlError) > 0)
            	header("location: /registrati.php?".$UrlError);
                
                
            

			$Query = "INSERT INTO Registrati(Nickname, Nome, Cognome, DataDiNascita, Email, Tel, Residenza, CAP, Password) VALUES ('$User','$Name','$Surname', '$Date', '$Mail','$Tel','$Res','$Cap','$Pass')";

			$Res = mysql_query($Query) or die(mysql_error()); 

          	if($Res){
				header("location: http://flyingbooks.altervista.org/profile.php");
          	}
          	else{
              	echo "<p align=\"center\"> Registrazione fallita <p>";
          	}
        }
    	mysql_close($connessione);
    ?>
    <div class="navbar navbar-default navbar-fixed-bottom">
          <div class="container">
              <p class="navbar-text">Progetto <strong>Classe 5 Info B</strong><br><a href="http://www.itisavoia.ch.it/sito5/">IIS Luigi Di Savoia</a>  </p>
          </div>
      </div>
</body>
</html>