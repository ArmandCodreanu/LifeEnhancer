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
                  <section class="contact">
                      <div class="map">
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11396.238423574412!2d26.073692790158717!3d44.431939525562555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b1ff427bee28c1%3A0x2b1089f802abaddc!2sPalatul+Parlamentului!5e0!3m2!1sro!2sro!4v1468437655990" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                      </div>
                      <div class="contact-us">
                          <div class="contact-info">
                              <div class="contact-title">Get in touch with us</div>
                              <div class="contact-desc">If you have any suggestions, questions, reclamations or you just want to talk to us, you can send us an e-mail below. We can also be found at the adress on the map. Thank you for using Enhancer.</div>
                          </div>
                          <div class="contact-form">
                             <form action="">
                                  <input type="text" name="nume" placeholder="Name" required="required">
                                  <input type="email" name="email" placeholder="e-mail" required="required">
                                  <textarea name="msg" placeholder="Message" required="required"></textarea>
                                  <input type="submit" value="Send us a message">
                              </form>
                          </div>
                      </div>
                  </section><!--
            </main>
		</div>
	</body>
</html>-->


<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
$("input[type='submit']").click(function(e){
    e.preventDefault();
    
    var nume = $("input[name='nume']").val();
    var email = $("input[name='email']").val();
    var msg = $("textarea").val();
    
    $.get("contactinc.php",{
        
        name:nume,
        email:email,
        msg:msg
        
    }, function(){
        alert("Multumim, mail-ul dvs. a fost trimis!");
    });
});
</script>