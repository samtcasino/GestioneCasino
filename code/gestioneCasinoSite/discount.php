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

<title>CashyLand - Promozioni</title>
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
                    <li><a href="game.php">Giochi</a></li>
                    <li><a href="sale.php">Sale</a></li>
                    <li class="active"><a href="discount.php">Promozioni</a></li>
                    <li><a href="login.html">Accedi</a></li>
               </ul>
          </div>

  </div>
</div>

<!-- Home Section -->

<section id="home" class="main-promozioni parallax-section">
     <div class="overlay"></div>
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <h1>Le Vostre Promozioni</h1>
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
                         $files = $db->executeQuery("select media_url,promotion_id from promotion_media");               
                         $n = 0;
                         foreach ($files as $key => $value) {
                              $promotionDescription = $db->executeQuery("select description,name from promotion where id = '".$value["promotion_id"]."'");
                              echo"
                                   <div class='blog-post-image' id='$n'> 
                                        <img src='".$value["media_url"]."' class='img-responsive' alt='Blog Image'> 
                                   </div>                             
                                   <div class='blog-post-title'> 
                                        <h3>".$promotionDescription[0]["name"]."</h3> 
                                   </div>                             
                                   <div class='blog-post-des'>
                                        <p>".$promotionDescription[0]["description"]."</p>
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