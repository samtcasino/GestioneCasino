<?php
    require_once "php/loader.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if(isset($_GET["type"])){
          $get = $_GET["type"];
          $query = "Insert into $get(";
          $n = 0;
          foreach ($_POST as $key => $value) {
               if($n+1 == sizeof($_POST))
                    $query .= $key;
               else
                    $query .= $key . ",";
               $n++;
          }
          $query .= ") values(";
          $n = 0;
          foreach ($_POST as $key => $value) {
               if($n+1 == sizeof($_POST))
                    $query .= "'$value'";
               else
                    $query .= "'$value'" . ",";
               $n++;
          }
          $query .= ")";
          //echo $query;
          $db->executeQuery($query);
          header("Refresh:0");
          }
    }
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

<title>CashyLand - Aggiungi</title>
<!--

Template 2085 Neuron

http://www.tooplate.com/view/2085-neuron

-->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">

<!-- Main css -->
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Lora|Merriweather:300,400" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

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

<section id="home" class="main-profile parallax-section">
     <div class="overlay"></div>
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <h1>Aggiungi <?php echo $_GET['type'];?></h1>
               </div>

          </div>
     </div>
</section>

<!-- login Section -->

<section id="login">
     <div class="container">
          <div class="row">

               <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <h2>Inserire dati</h2>

                    <form method="post" action="" id="registration_form">
                        <?php
                            $get = $_GET['type'];
                            try{
                                   $result = $db->executeQuery("desc $get");
                                   foreach ($result as $key => $value) {
                                        for ($i=0; $i < 1; $i++) { 
                                             if($i == 0){
                                                  $type = "number";
                                                  if (strpos($value[1], 'varchar') !== false) {
                                                       $type = "text";
                                                  }else if(strpos($value[1], 'date') !== false){
                                                       $type = "date";
                                                  }
                                                  echo "<div class='col-md-12 col-sm-12'>
                                                  <span>".$value[0].":</span>
                                                  <input name='".$value[0]."' type='$type' class='form-control' id='".$value[0]."' placeholder='".$value[0]."'>
                                                  </div>"; 
                                             }
                                        }
                                        echo "<br>";
                                   }
                                   
                              }catch(InvalidArgumentException $iae){
                                   setcookie("error","Qualcosa è andato storto",10);
                              }
                        ?>

                         <div class="col-md-12 col-sm-12" id="button-login">
                              <input name="modify" type="button" class="form-control" id="modify" value="AGGIUNGI" onclick="document.getElementById('registration_form').submit()">
                         </div>
                         
                    </form>
                    <?php
                         if($_GET["type"] == "room"){
                              echo'
                                   <a href="addThings.php?type=room_media"><input type="button" class="form-control" value="Aggiungi un immagine alla sala!"></a>
                              ';
                         }else if($_GET["type"] == "game"){
                              echo'
                                   <a href="addThings.php?type=game_media"><input type="button" class="form-control" value="Aggiungi un immagine al gioco!"></a>
                              ';
                         }else if($_GET["type"] == "promotion"){
                              echo'
                                   <a href="addThings.php?type=promotion_media"><input type="button" class="form-control" value="Aggiungi un immagine alla promozione!"></a>
                              ';
                         }
                    ?>
               </div>

          </div>
          <br><br><br><br><br><br>
          <div class="row">
                <div class="col-md-offset-1 col-md-10 col-sm-12 table-responsive text-nowrap">
                        <h2>Vedi già le cose presenti:</h2>
                        <?php
                            $get = $_GET["type"];
                            if(isset($_GET["type"]))
                              $db->printTableQuery("select * from $get");
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
<script src="js/modifyDati.js"></script>

</body>
</html>