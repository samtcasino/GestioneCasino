<?php
	if (isset($_GET['id'])) {
	    $id = $_GET['id'];
	    echo $id."<br>";
	    $email = $id ^ "SGG<?rpF3FTebqx?(kgQR:hsq'mqZ!VH";
	    echo $email . " ti sei registrato con successo";
	} else {
	    // Fallback behaviour goes here
	}
?>