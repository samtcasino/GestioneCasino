<?php
     require_once "php/loader.php";
     session_start();
     if(empty($_SESSION["username"])){
          setcookie("error","Pagina non trovata :(", time() + 1000,"/");
          header("Location: error.html");
          exit();
     }
     
     $queryRepose = $db->executeQueryWithoutFetch("select * from user where email = '".$_SESSION['username']."'")->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>CashyLand - MyAccount</title>
<!--

Template 2085 Neuron

http://www.tooplate.com/view/2085-neuron

-->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/magnific-popup.css">

<!-- Main css -->
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Lora|Merriweather:300,400" rel="stylesheet">

</head>
<body>

<!-- PRE LOADER -->

<div class="preloader">
     <div class="sk-spinner sk-spinner-wordpress">
          <span class="sk-inner-circle"></span>
     </div>
</div>

<!-- Navigation section  -->

<div class="navbar navbar-default navbar-static-top" role="navigation">
     <div class="container">

          <div class="navbar-header">
               <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
               </button>
               <a href="index.html" class="navbar-brand">Ca$hy Land</a>
          </div>
          <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">Giochi</a></li>
                    <li><a href="sale.html">Sale</a></li>
                    <li><a href="gallery.html">Foto</a></li>
                    <li class="active"><a href="login.html">Accedi</a></li>
               </ul>
          </div>

  </div>
</div>

<!-- Home Section -->

<section id="home" class="main-profile parallax-section">
     <div class="overlay"></div>
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <h1>Bentornato <?php echo $queryRepose["name"]?></h1>
               </div>

          </div>
     </div>
</section>

<!-- Profile Section -->

<section id="profile">
    <br><br><br>
     <div class="container">
          <div class="row">
            <div class="col-md-offset-1 col-md-10 col-sm-12">

                    <div class="col-md-6 col-sm-6 modify">
                        <h2>Informazioni Base:</h2><br>
                        <p><span class="header-modify">Nome: </span><span><?php echo $queryRepose["name"]?></span></p>
                        <p><span class="header-modify">Cognome: </span><span><?php echo $queryRepose["surname"]?></span></p>
                        <p><span class="header-modify">Nascita: </span><span><?php echo $queryRepose["birthday"]?></span></p>
                        <a href="modifyInformation.php"><input type="button" class="form-control" value="Modifica Dati"></a>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <h2>Modifica Password:</h2><br>
                        <p><span class="header-modify">Email: </span><span><?php echo $_SESSION["username"]?></span></p>
                        <form action="php/password/sendLostPassword.php" method="post">
                              <input type="submit" class="form-control" value="Modifica password">
                              <input type="hidden" <?php echo "value=".urlencode($queryRepose["email"]^$privateKey)?>>
                         </form>
                    </div>
                    <div class="col-md-12 col-sm-12" id="utente">
                         <h2>Visualizza Promozioni:</h2>
                         <p>Cliccando il bottone qui sotto puoi visualizzare tutte le promozioni da utilizzare all\'interno del nostro casinò:</p>
                         <a href="resetPassword.html"><input type="button" class="form-control" value="Visualizza Promozioni"></a>
                         <br>
                    </div>';




                    <?php 
                         if($queryRepose["admin"]==1){
                              echo'
                              <div class="col-md-12 col-sm-12" id="admin">
                                   <h2>Gestione Utenti:</h2>
                                   <br>
                                   <p>Puoi gestire tutti gli utenti del sito, aggiungere o togliere qualsiasi utente: </p>
                                   <a href="addThings.php?type=user"><input type="button" class="form-control" value="Modifica Utenti"></a>
                                   <br>
                                   <br>
                                   <h2>Gestione Sale:</h2>
                                   <br>
                                   <p>Puoi gestire tutte le sale del sito, aggiungere o togliere qualsiasi sala: </p>
                                   <a href="addThings.php?type=user_promotion"><input type="button" class="form-control" value="Modifica Sale"></a>
                                   <br>
                                   <br>
                                   <h2>Gestione Giochi:</h2>
                                   <br>
                                   <p>Puoi gestire tutti i giochi del sito, aggiungere o togliere qualsiasi gioco:</p>
                                   <a href="addThings.php?type=game"><input type="button" class="form-control" value="Modifica Giochi"></a>
                                   <br>
                                   <br>
                                   <h2>Gestione Promozioni:</h2>
                                   <p>Puoi gestire tutte le promozioni del sito, aggiungere o togliere qualsiasi promozioni:</p>
                                   <a href="addThings.php?type=user_promotion"><input type="button" class="form-control" value="Modifica Promozioni"></a>
                                   <br>
                              </div>
                              ';
                         }
                    ?>

               </div>
          </div>
     </div>
     <br><br><br>
</section>

<!-- Footer Section -->

<footer>
    <div class="container">
         <div class="row">

              <div class="col-md-5 col-md-offset-1 col-sm-6">
                   <h3>Cashy Land</h3>
                   <p> Sito per la gestione del casinò Cashy Land. Qui puoi trovare come è composto il casino ed eventuali promozioni.</p>
                   <div class="footer-copyright">
                        <p>Copyright &copy; 2019 Cashy Land</p>
                   </div>
              </div>

              <div class="col-md-4 col-md-offset-1 col-sm-6">
                   <h3>Contattaci</h3>
                   <p><i class="fa fa-location-arrow"></i> Via Trevano, 6952 Canobbio</p>
                   <p><i class="fa fa-envelope-o"></i> gruppocasin02018@hotmail.com</p>
                   <p><i class="fa fa-github"></i> https://github.com/samtcasino/GestioneCasino</p>
              </div>
              
         </div>
    </div>
</footer>

<!-- Back top -->
<a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>

<!-- SCRIPTS -->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/custom.js"></script>

</body>
</html>