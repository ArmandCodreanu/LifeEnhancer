<?php

require_once("conn.php");

function e_sql($value){
    return mysqli_real_escape_string($link, $value);
}

function e_html($value){
    return htmlspecialchars($value, ENT_QUOTES,"UTF-8");
}

?>