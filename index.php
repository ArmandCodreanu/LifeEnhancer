<?php
 
require_once("inc/conn.php");
if($_SESSION['cirese']!="bicla")
    header("Location: login.php");

?>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" href="style.css" >
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,100' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
	<div id="load"></div>
		<div class="container">
		<label for="menu-btn">
		    <div id="nav-icon1" class="">
              <span></span>
              <span></span>
              <span></span>
            </div>
		</label>
		<input type="checkbox" id="menu-btn">
			<div class="sidebar">
				<div class="logo-holder">
					<a href="index.html"><img src="img/logo.png"></a>
				</div>
				<nav>
					<ul>
					    <li>
                            <form action="">
					            <input type="text" name="titlu" placeholder="Movies, series, episodes ..." required="required">
					            <label for="lupa"><span class="icon-search"></span></label>
					            <input id="lupa" type="submit" name="sub">
					            <select name="type">
                                    <option value="movie">Filme</option>
                                    <option value="series">Seriale</option>
                                    <option value="episode">Episoade</option>
                                </select>
					        </form>
					    </li>
						<li><a href="#">HOME</a></li>
						<li><a href="friends.php">FRIENDS</a></li>
						<li><a href="profile.php?nume=<?php echo $_SESSION['email']; ?>"><?php echo $_SESSION['email'];/*echo "<img class='avatar' src='{$_SESSION['poza']}'>";*/ ?></a></li>
						<li><a href="contact.php">CONTACT</a></li>
						<li><a href="logout.php">LOG OUT</a></li>
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
            <main class="cd-main">
                  <section class="cd-section index visible">
                   <header>
                        <div class="cd-title">
                            <div class="holder-group" style="min-height:80px;">
                               <img src="img/holder.svg" alt="" class="viata">
                            </div>
                         </div>
                    </header>
                </section>
            </main>
			

		</div>
<!-- jQueryUI -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    $(".sidebar a[href='logout.php']").click(function(){
        window.location.replace("logout.php");
    });
    
    /* LINKS*/
    $(".sidebar a").click(function(e){
                e.preventDefault();
                var linkPath = $(this).attr("href");
                $(".holder-group").css("left",$(this).css("width"));
                $(".holder-group").css("opacity",0);
                $(".holder-group").load(linkPath,function(){
                    
                $(".holder-group").css("left","-"+$(this).css("width"));
                            $(".holder-group").animate({
                                opacity:1,
                                left:"20%"                        
                            },600,function(){
                                    //succesful
                            });
                });
            });
    /*Search*/
        $("input[type='submit']").click(function(e){
                
                //$("#loader").prepend("<img src='img/loading.gif'>");
                
                e.preventDefault();
                
                width=$(".holder-group").css("width");
                
                
                var titlu = $("input[name='titlu']").val();
                var type = $("input[name='type']").val();
                
                $.get("indexinc.php", { titlu:titlu, type:type, sub:"Cauta" }, function(data){
                $(".holder-group").animate({
                    
                        opacity:0,
                        left: "+=300px"    
                        
                    },600,function(){
                    
                        
                    $(".holder-group").html(data);
                    
                     $(".holder-group").css("left","-"+$(this).css("width"));
                            $(".holder-group").animate({
                                opacity:1,
                                left: "20%"                  
                            },600,function(){
                                    //succes
                                });   
                        });
                    });                
            });
        var count=0;
            $('#nav-icon1').click(function(){
                $(this).toggleClass('open');
                if(!(count%2))
                $("label[for='menu-btn']").animate({
                    left:"80%"
                },500);
                else 
                $("label[for='menu-btn']").animate({
                    left:"20px"
                },500);
                
                count++;
            });
            
    $("a").click(function(){
        $("#load").animate({
            width:"100%"
        },1500,function(){
                $(this).css("width","0");
        });
    });
    
    $("input[type='submit']").click(function(){
        $("#load").animate({
            width:"100%"
        },4500,function(){
                $(this).css("width","0");
        });
    });
    
    
    
    $("a[href^='profile.php']").click(function(){
        $("#load").animate({
            width:"100%"
        },8500,function(){
                $(this).css("width","0");
        });
    });
</script>
	</body>
</html>