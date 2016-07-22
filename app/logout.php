<?php

require_once("inc/conn.php");

$query="UPDATE users SET logat = '0' WHERE email='{$_SESSION['email']}'";
mysqli_query($link,$query);

$_SESSION = array();

session_destroy();

header("location:index.php");

?>