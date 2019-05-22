<?php
     require_once "php/loader.php";
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

<title>CashyLand - Giochi</title>
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
                 <li id="homeLi">
                     <a href="index.html" id="homeBtn">Home</a>
                 </li>
                 <li id="gameLi">
                     <a href="game.php" id="gameBtn">Giochi</a>
                 </li>
                 <li id="roomLi">
                     <a href="sale.php" id="roomBtn">Sale</a>
                 </li>
                 <li class="active" id="loginLi">
                     <a href="login.html" id="loginBtn">Accedi</a>
                 </li>
               </ul>
          </div>

  </div>
</div>

<!-- Home Section -->

<section id="home" class="main-game parallax-section">
     <div class="overlay"></div>
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <h1>I Nostri Giochi</h1>
               </div>

          </div>
     </div>
</section>

<!-- Gallery Section -->

<section id="blog">
     <div class="container">
         <div class="row">
             <div class="col-md-offset-1 col-md-10 col-sm-12">
                 <div class="blog-post-thumb">
                    <?php
                         $files = $db->executeQuery("select media_url,game_name from game_media");
                         $n = 0;
                         foreach ($files as $key => $value) {
                              $gameDescription = $db->executeQuery("select description from game where name = '".$value["game_name"]."'");
                              echo"
                                   <div class='blog-post-image' id='$n'>
                                        <img src='".$value["media_url"]."' class='img-responsive' alt='Blog Image'>
                                   </div>
                                   <div class='blog-post-title'>
                                        <h3>".$value["game_name"]."</h3>
                                   </div>
                                   <div class='blog-post-des'>
                                        <p>".$gameDescription[0]["description"]."</p>
                                   </div>
                                   <hr>
                              ";
                              $n++;
                         }
                    ?>
                 </div>
             </div>
         </div>
     </div>
 </section>

<!-- Footer Section -->

<footer>
     <div class="container">
          <div class="row">

               <div class="col-md-5 col-md-offset-1 col-sm-6">
                    <h3>Cashy Land</h3>
                    <p> Sito ufficiale del casinò Cashy Land. Qui puoi trovare come è composto il casino ed eventuali promozioni.</p>
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