<?php require("registerinc1.php"); ?>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="style_mobil.css">
        <title>Cyber Technician | Register</title>
        <link rel="shortcut icon" href="img/icon.ico">
    </head>
    <body id="loginbody">
      <div class="overlay">
       <div id="log">
       <img src="img/logo.png" alt="">
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="nume" placeholder="Nume" required>
            <input type="text" name="prenume" placeholder="Prenume" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="file" name="avatar">
            <input type="password" name="pass" placeholder="Parola" required>
            <input type="password" id="rcht" name="cpass" placeholder="Confirma parola" required><br>
            <input type="submit" id="rcht2" name="sub" value="Register">
        </form>
            <?php require("registerinc2.php"); ?>
           <a id="linklog" href="login.php">Ai deja cont? Intra acum!</a>
           
        </div>
        </div>
    </body>
</html>