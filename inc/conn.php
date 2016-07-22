<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "filme";

$link = mysqli_connect($host, $user, $pass, $db);

if(!$link){
    echo "Eroare: ".mysqli_error($link);
}
require_once("functions.php");
session_start();

?>