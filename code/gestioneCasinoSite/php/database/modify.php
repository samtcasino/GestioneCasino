<?php
    require_once "../loader.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_GET["table"])){
            $get = $_GET["table"];
            
            $n = 0;
            $query = "update ".$get." set ";
            foreach ($_POST as $key => $value) {
                if($n>1){
                    if($n+1 == sizeof($_POST))
                        $query .= $key." = '". $value. "'";
                    else
                        $query .= $key." = '". $value. "', ";
                    
                }
                $n++;
            }
            $n =0;
            $query .= " WHERE ".$_POST["primaryKey"]." = '". $_POST["keyValue"]. "'";
            //echo $query;
            $db->executeQuery($query);
            //$db->executeQuery($query);
            header("Location: ../../addThings.php?type=$get");
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
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/font-awesome.min.css">

<!-- Main css -->
<link rel="stylesheet" href="../../css/style.css">
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
                    <li><a href="game.html">Giochi</a></li>
                    <li><a href="sale.html">Sale</a></li>
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
                    <h1>Modifica dati</h1>
               </div>

          </div>
     </div>
</section>
<!-- login Section -->

<section id="login">
     <div class="container">
          <div class="row">
               <div class="col-md-offset-1 col-md-10 col-sm-12">
                  
                        <?php
                            if(isset($_GET["table"]) && isset($_GET["value"]) && isset($_GET["key"])){
                                echo "<form id='update_form' method='post'>";
                                $result = "";
                                try{
                                    $result = $db->executeQuery("select * from ".$_GET["table"]." where ".$_GET["key"]." = '".$_GET["value"]."'");
                                }catch(InvalidArgumentException $ie){}
                                $n =0;
                                echo "<input class='form-control' type='hidden' name='primaryKey' value='".$_GET["key"]."'>";
                                echo "<input class='form-control' type='hidden' name='keyValue' value='".$_GET["value"]."'>";
                                foreach ($result[0] as $key => $value) {
                                    if($n%2==0){
                                        echo"
                                            <div class='col-md-6 col-sm-6 field'>
                                                <span>$key:</span>
                                                    <span class='d-inline-block' tabindex='0' data-toggle='tooltip' title='Disabled tooltip'>";
                                                    echo "<input class='form-control' type='text' name='".$key."' value='".$value."'>";    
                                                echo "</span>
                                            </div>
                                        ";
                                    }$n++;
                                }
                            }else{
                                header('Location: ' . $_SERVER['HTTP_REFERER']);
                            }
                        ?>
                        <div class="col-md-12 col-sm-12" id="button-login">
                            <input name="modify" type="button" class="form-control" id="modify" value="MODIFICA" onclick="document.getElementById('update_form').submit()">
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

<script src="../../js/index.js"></script>
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery.parallax.js"></script>
<script src="../../js/custom.js"></script>
<script src="../../js/notify.js"></script>
<script src="../../js/modifyDati.js"></script>

</body>
</html>