<?php

require("logininc.php");

?>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <title>Cyber Technician | Log In</title>
        <link rel="shortcut icon" href="img/icon.ico">
    </head>
    <body id="loginbody">
       <div class="overlay">
        <div id="log">
           <img src="img/logo.png" alt="">
            <form method="post">
                <input type="email" name="email" placeholder="E-mail" required ><br>
                <input type="password" name="pass" placeholder="Parola" required ><br>
                <?php
                if($err)
                    echo "<span id='eroare'>Date incorecte !</span>";
                
                ?>
                <input type="submit" name="sub" value="Intra in cont">
            </form>
            <a href="register.php">Nu ai cont? Inregistreaza-te!</a>
        </div>
        </div>
    </body>
</html>