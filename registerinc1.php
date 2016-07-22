<?php

require_once("inc/conn.php");

if(isset($_POST['sub']) && $_POST['pass']==$_POST['cpass']){
    
    $pass=md5($_POST['pass']);
    $_POST['email'] = mysqli_real_escape_string($link,$_POST['email']);
    $_POST['nume'] = mysqli_real_escape_string($link,$_POST['nume']);
    $_POST['prenume'] = mysqli_real_escape_string($link,$_POST['prenume']);
    $path = "avatar/".time()."_".$_FILES['avatar']['name'];
    $query="INSERT INTO users (email, pass, nume, prenume, avatar_path) VALUES (
        '{$_POST['email']}',
        '$pass',
        '{$_POST['nume']}',
        '{$_POST['prenume']}',
        '$path'
    )";
    move_uploaded_file($_FILES['avatar']['tmp_name'],$path);
    
}

?>