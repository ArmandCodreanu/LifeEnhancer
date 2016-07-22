<?php

$to = "cod_armi@yahoo.com";
$subject = $_GET['name'];
$txt = $_GET['msg'];
$headers = "From: ".$_GET['email']."\n";
$headers.= "MIME-version: 1.0\n";
$headers.= "Content-type: text/html; charset= iso-8859-1\n";
mail($to,$subject,$txt,$headers);

?>