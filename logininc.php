<?php

require_once("inc/conn.php");

if(isset($_POST['sub'])){
    
    $pass=md5($_POST['pass']);
    $_POST['email'] = mysqli_real_escape_string($link, $_POST['email']);
    $query="SELECT pass, email, avatar_path FROM users WHERE email='{$_POST['email']}'";
    
    $res=mysqli_query($link, $query);
    if(!mysqli_num_rows($res))$err=1;
    while($dbPass=mysqli_fetch_row($res)){
        if($dbPass[0]==$pass){
            $_SESSION['cirese']="bicla";
            $_SESSION['email']=$dbPass[1];
            $_SESSION['poza']=$dbPass[2];
            mysqli_close($link);
            header("location: index.php");
        }else{
            $err=1;
        }
           
    }
}         

?>