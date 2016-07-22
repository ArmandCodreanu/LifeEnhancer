<?php

require_once("inc/conn.php");

if(isset($_GET['sub'])){
    $query="SELECT id, email, avatar_path FROM users WHERE email LIKE '{$_GET['friend']}' OR nume LIKE '{$_GET['friend']}' OR prenume LIKE '{$_GET['friend']}'";
    
    $res = mysqli_query($link, $query);
    
    if(mysqli_num_rows($res)>0){
        while($v=mysqli_fetch_row($res))
            echo '
                <div class="result">
                  <img src="'.$v[2].'" alt="'.$v[1].'">
                  <div class="result-info">
                      <div class="result-email">'.$v[1].'</div>
                      <div class="result-link">
                          <a href="profile.php?'.$_GET['friend'].'">See profile >></a>
                      </div>
                  </div>
                </div>
                <div class="clear"></div>
            ';
    }else{
        echo "Nu s-au gasit rezultate pentru: ".$_GET['friend'];
    }
}

?>

<script>
    /*$("a[href='profile.php']").click(function(){
        var friend = $(this).attr("href").split("?");
        $.get("profileinc.php",{nume:friend[1]},function(){
            
        })
    });*/
    
     $("a[href^='profile.php']").click(function(e){
                //$("#loader").prepend("<img src='img/loading.gif'>");
                
                e.preventDefault();
                
                width=$(".holder-group").css("width");
                
                
                var friend = $(".result-email").html();
                
                $.get("profile.php", { nume:friend }, function(data){
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
</script>