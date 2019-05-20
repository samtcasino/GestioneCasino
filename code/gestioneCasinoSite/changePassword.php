<!DOCTYPE html>
<html lang="it">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="PasswordSmarrita Cashy Land">
<meta name="keywords" content="PasswordSmarrita">
<meta name="author" content="gruppocasin02018">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>CashyLand - Resetta Password</title>
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
                    <li><a href="game.php">Giochi</a></li>
                    <li><a href="sale.php">Sale</a></li>
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
                    <h1>Resetta la tua password</h1>
               </div>

          </div>
     </div>
</section>

<!-- Verifica mail Section -->

<section id="login">
     <div class="container">
          <div class="row">
               <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <h2>Cambia la tua vecchia password</h2>
                    <span>Inserisci due volte la tua nuova password. (min. 8 caratteri, Maiuscola e Numero)</span>
                    <?php 
                    require "php/loader.php";
                    if (isset($_GET['id'])) {
                         $id = $_GET['id'];
                         $email = urldecode($id);
                         $email = $email ^ $privateKey;

                         if(!(gettype($db->existsUserByEmail($email)) == "boolean")){
                                   if($_SERVER['REQUEST_METHOD'] == "POST"){
                                        echo "Lol";
                                        if(isset($_POST["password"]) && isset($_POST["repassword"])){
                                             $db->executeQuery('update user set password = "'.$_POST["password"].'" where email = "'.$email.'"');
                                             header("Location: login.html");
                                        }
                                   }else{
                                   echo "<form id='registration_form' action='php/password/resetPassword.php?id=".urlencode($email^$privateKey)."' method='post'>";
                                   echo "    <div class='col-md-6 col-sm-6'>";
                                   echo "          <span>Password:</span>";
                                   echo "         <input name='password' type='password' class='form-control' id='password' placeholder='Password'  onkeydown='normal(this)'>";
                                   echo "     </div>";
                                   echo "     <div class='col-md-6 col-sm-6'>";
                                   echo "          <span>Ripeti Password:</span>";
                                   echo "         <input name='repassword' type='password' class='form-control' id='repassword' placeholder='Ripeti Password'  onkeydown='normal(this)'>";
                                   echo "</div>";
                                   echo "<br>";
                                   echo "<div class='col-md-12 col-sm-12' id='button-login'>";
                                   echo "     <input name='register' type='button' class='form-control' id='button' value='REGISTRATI' onclick='checkAll()'>";
                                   echo " </div>";
                                   echo "</form>";
                                   
                              }
                         }else{
                              echo "Errore";
                         }
                    }
                    ?>
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
<script src="js/changePassword.js"></script>

</body>
</html>