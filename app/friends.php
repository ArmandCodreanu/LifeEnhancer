<html>
	<head>
		<link rel="stylesheet" href="style.css" >
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,100' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div class="container">
			<!--<div class="sidebar">
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
                  <section class="friends">
                     <div class="prieteni">
                          <div class="search-friend">
                              <form>
                                  <input type="text" name="friend" placeholder="Search by name or email"><input id="send" type="submit" name="sub"><label for="send"><span class="icon-binoculars"></span></label>
                              </form>
                              <div class="clear"></div>
                          </div>
                          <div class="result-hold">
                              
                             
                              <div class="clear"></div>
                          </div>
                      </div>
                  </section>
                  <!--
            </main>
		</div>
	</body>
</html>-->
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
   /*FRIEND*/
     $("input[type='submit']").click(function(e){
                
                //$("#loader").prepend("<img src='img/loading.gif'>");
                
                e.preventDefault();
                
                width=$(".result-hold").css("width");
                
                
                var friend = $("input[name='friend']").val();
                var sub = $("input[name='sub']").val();
                
                $.get("friendsinc.php", { friend:friend, sub:sub }, function(data){
                $(".result-hold").animate({
                    
                        opacity:0  
                        
                    },600,function(){
                    
                        
                    $(".result-hold").html(data);
                    
                     $(".result-hold").css("left","-"+$(this).css("width"));
                            $(".result-hold").animate({
                                opacity:1                 
                            },600,function(){
                                    //succes
                                });   
                        });
                    });                
            });
     $(".result-link a").click(function(e){
                e.preventDefault();
                var linkPath = $(this).attr("href");
                $(".holder-group").css("left",$(this).css("width"));
                $(".holder-group").css("opacity",0);
                $(".holder-group").load(linkPath,function(){
                    
                $(".holder-group").css("left","-"+$(this).css("width"));
                            $(".holder-group").animate({
                                opacity:1,
                                left: "20%"       
                            },600,function(){
                                    //succesful
                            });
                });
            });
</script>