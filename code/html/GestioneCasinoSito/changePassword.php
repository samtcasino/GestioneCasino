<!DOCTYPE html>
<html lang="it">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="PasswordSmarrita Cashy Land">
<meta name="keywords" content="PasswordSmarrita">
<meta name="author" content="gruppocasin02018">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>GestioneCasino - Password Smarrita?</title>
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
               <a href="index.html" class="navbar-brand">Cashy Land</a>
          </div>
          <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">Giochi</a></li>
                    <li><a href="about.html">Sale</a></li>
                    <li><a href="gallery.html">Foto</a></li>
                    <li><a href="login.html">Accedi</a></li>
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
                    <h1>Password Smarrita?</h1>
               </div>

          </div>
     </div>
</section>

<!-- Password Section -->

<section id="login">
     <div class="container">
          <div class="row">

               <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <h2>Cambia la password!</h2>
                    <span>Inserisci la nuova password per cambiarla</span>
                    <?php
                         require "../../php/loader.php";
                         if (isset($_GET['id'])) {
                             $id = $_GET['id'];
                             $email = urldecode($id);
                             $email = $email ^ $privateKey;

                          if(!(gettype($db->existsUserByEmail($email)) == "boolean")){
                                   if($_SERVER['REQUEST_METHOD'] == "POST"){
                                        if(isset($_POST["password"]) && isset($_POST["repassword"])){
                                             $db->executeQuery('update user set password = "'.$_POST["password"].'" where email = "'.$email.'"');
                                        }
                                   }else{
                                   echo"
                                        <body>
                                                  <form action='changePassword.php?id=".urlencode($email^$privateKey)."' method='post'>
                                                       <span>Password:</span>
                                                       <input type='password' name='password'><br>
                                                       <span>Repeat-Password:</span>
                                                       <input type='password' name='repassword'><br>
                                                       <input type='submit' name='' value='VAI!''>
                                                  </form>
                                             </body>
                                   ";
                                  }
                             }else{
                              echo "Qualcosa è andato storto :(";
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

               <div class="clearfix col-md-12 col-sm-12">
                    <hr>
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

</body>
</html>