<?php

require_once("inc/conn.php");

     $query = "SELECT filme, nume, prenume, email, avatar_path FROM users WHERE email='{$_GET['nume']}'";
        $res = mysqli_query($link, $query);
        $v = mysqli_fetch_row($res);
        
?>
<!--<html>
	<head>
		<link rel="stylesheet" href="style.css" >
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,100' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div class="container">
			<div class="sidebar">
				<div class="logo-holder">
					<a href="index.html"><img src="img/logo.png"></a>
				</div>
				<nav>
					<ul>
					    <li>
                            <form action="">
					            <input type="text" name="" placeholder="Movies, series, episodes ..."><input id="lupa" type="submit" name=""><label for="lupa"><span class="icon-search"></span></label>
					        </form>
					    </li>
						<li><a href="#">HOME</a></li>
						<li><a href="#">FRIENDS</a></li>
						<li><a href="#">email@blabla.com</a></li>
						<li><a href="#">CONTACT</a></li>
						<li><a href="#">LOG OUT</a></li>
					</ul>
				</nav>
				<div class="footer">
				    <span class="legal">
				        Legal<span class="icon-profile"></span>
				    </span>
				    <ul>
				        <li class="alb">Information</li>
				        <a href=""><li>termeni</li></a>
				        <a href=""><li>conditii</li></a>
				        <a href=""><li>drepturi</li></a>
				        <a href=""><li>about</li></a>
				        <a href=""><li>disclaimer</li></a>
				    </ul>
				</div>
				<div class="social">
                    <div class="icon"><a href=""><span class="icon-google-plus2"></span></a></div>
                    <div class="icon"><a href=""><span class="icon-facebook2"></span></a></div>
                    <div class="icon"><a href=""><span class="icon-vk"></span></a></div>
                    <div class="icon"><a href=""><span class="icon-flickr3"></span></a></div>
                    <div class="icon"><a href=""><span class="icon-linkedin"></span></a></div>
                    <div class="icon"><a href=""><span class="icon-tumblr2"></span></a></div>
				</div>
				<div class="copy">
				    &copy; 2016 Armand. All Rights Reserved
				</div>
			</div>
            <main class="cd-main">-->
                  <section class="profile">
                     <div class="profil">
                         <img src="<?php echo $v[4]; ?>" alt="">
                         <div class="profile-name"><?php echo $v[1]." ".$v[2];  ?></div>
                         <div class="profile-email"><?php echo $_GET['nume'];  ?></div>
                         <div class="profile-title">Watched movies</div>
                         <div class="watched-holder">
                             
                             <?php require("profileinc.php"); ?>
                         </div>
                         
                         <!--
                     </div>
                  </section>
            </main>
		</div>

	</body>
</html>-->


<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    
</script>