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
<html lang="it">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="Registrazione Cashy Land">
<meta name="keywords" content="Registrazione">
<meta name="author" content="gruppocasin02018">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>CashyLand - ModificaDati</title>
<!--

Template 2085 Neuron

http://www.tooplate.com/view/2085-neuron

-->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">

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
                    <li class="active"><a href="login.html">Accedi</a></li>
               </ul>
          </div>

  </div>
</div>

<!-- Home Section -->

<section id="home" class="main-login parallax-section">
     <div class="overlay"></div>
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <h1>Modifica i tuoi dati</h1>
               </div>

          </div>
     </div>
</section>

<!-- login Section -->

<section id="login">
     <div class="container">
          <div class="row">

               <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <h2>Modifica Dati</h2>

                    <form method="post" action="post/login/update.php" id="update_form">
                         <div class="col-md-6 col-sm-6">
                              <span>Nome:</span>
                              <input value="<?php echo $queryRepose['name']?>" name="firstname" type="text" class="form-control" id="firstname" placeholder="Nome" onkeydown="normal(this)" onfocus="tooltip(this,'  Max 50 caratteri, solo lettere e caratteri da scrittura')">
                         </div>
                         <div class="col-md-6 col-sm-6">
                              <span>Cognome:</span>
                              <input value="<?php echo $queryRepose['surname']?>" name="surname" type="text" class="form-control" id="surname" placeholder="Cognome" onkeydown="normal(this)" onfocus="tooltip(this,'  Max 50 caratteri, solo lettere e caratteri da scrittura')">
                         </div> 
                         <div class="col-md-6 col-sm-6">
                              <span>Via:</span>
                              <input value="<?php echo $queryRepose['street']?>" name="address" type="text" class="form-control" id="address" placeholder="Via" onkeydown="normal(this)" onfocus="tooltip(this,'  Max 50 caratteri, solo lettere e caratteri da scrittura')">
                         </div> 
                         <div class="col-md-6 col-sm-6">
                              <span>No. Civico:</span>
                              <input value="<?php echo $queryRepose['house_number']?>" name="houseNumber" type="text" class="form-control" id="houseNumber" placeholder="Numero Civico" onkeydown="normal(this)" onfocus="tooltip(this, ' Max 4 caratteri, numero ed eventualmente lettera')">
                         </div> 
                         <div class="col-md-6 col-sm-6">
                              <span>CAP:</span>
                              <input value="<?php echo $queryRepose['zip_code']?>" name="zipCode" type="text" class="form-control" id="zipCode" placeholder="CAP" onkeydown="normal(this)" onfocus="tooltip(this, '4-5 Numeri')">
                         </div> 
                         <div class="col-md-6 col-sm-6">
                              <span>Città:</span>
                              <input value="<?php echo $queryRepose['city']?>" name="city" type="city" class="form-control" id="city" placeholder="Città" onkeydown="normal(this)" onfocus="tooltip(this,'  Max 50 caratteri, solo lettere e caratteri da scrittura')">
                         </div> 
                         <div class="col-md-6 col-sm-6">
                              <span>No. Telefono:</span>
                              <input value="<?php echo $queryRepose['phone_number']?>" name="phoneNumber" type="text" class="form-control" id="phoneNumber" placeholder="Numero di Telefono" onkeydown="normal(this)" onfocus="tooltip(this, 'Solo numeri, spazi, più e cancelleto')">
                         </div>
                         <div class="col-md-6 col-sm-6">
                              <span>Data Nascita:</span>
                              <input value="<?php echo $queryRepose['birthday']?>" name="birthday" type="date" class="form-control" id="birthday" placeholder="Data di nascita" onkeydown="normal(this)" onkeydown="normal(this)" onfocus="tooltip(this, 'Maggiorenne e età massima 100')">
                         </div>
                         <br>
                         <div class="col-md-12 col-sm-12" id="button-login">
                              <input name="modify" type="button" class="form-control" id="modify" value="MODIFICA" onclick="checkAll()">
                         </div>
                    </form>
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
<script src="js/jquery.parallax.js"></script>
<script src="js/custom.js"></script>
<script src="js/notify.js"></script>
<script src="js/modifyDati.js"></script>

</body>
</html>