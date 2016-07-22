<?php

           
        if(isset($_GET['page'])){
           $response = json_decode(file_get_contents("https://www.omdbapi.com/?s={$_GET['titlu']}&page={$_GET['paging']}&type={$_GET['type']}"),"true") ;
        
            
                    
        for ($i=0;$i<count($response['Search']);$i++){
            $numeImg = explode("/",$response['Search'][$i]['Poster']);
            $nume = $numeImg[count($numeImg)-1];
            
            $imageString = file_get_contents($response['Search'][$i]['Poster']);
            $save = file_put_contents("filmImg/".$nume,$imageString);
            /*
            echo "<img src='filmImg/$nume' title='{$response['Search'][$i]['Title']}'><br>";
            
            echo $response['Search'][$i]['Title']."<br>";
            echo $response['Search'][$i]['Year']."<br>";
            
            $response['Search'][$i]['Title']=str_replace(" ","%20",$response['Search'][$i]['Title']);
            
            echo "
                <a href='film.php?titlu={$response['Search'][$i]['imdbID']}&movie={$response['Search'][$i]['Title']}&year={$response['Search'][$i]['Year']}'>Vezi mai mult ...</a><br>
            ";*/
            
            echo '
            <div class="holder">
            <img src="filmImg/'.$nume.'" title="'.$response['Search'][$i]['Title'].'">
            <div class="peste">
            <div class="tinator">
            <div class="titlu-film">
            '.$response['Search'][$i]['Title'].'
            </div>
            <div class="an-film">
            '.$response['Search'][$i]['Year'].'
            </div>
            <a href="single.php?titlu='.$response['Search'][$i]['imdbID'].'&movie='.$response['Search'][$i]['Title'].'&year='.$response['Search'][$i]['Year'].'">
            <span class="icon-circle-right"></span>
            </a>
            </div>
            </div>
            </div>

            ';
       }
        if($response['Response']=="False") echo "Filmul nu a fost gasit! Incercati alt keyword.";
        
         if($response['totalResults']>10){
        echo "<div class='holder'><form class='paginatie'>Pagina:<select name='paging'>";
            
        for($i=1;$i<$response['totalResults']/10+1;$i++){
            
        if($i==$_GET['paging'])
            echo "<option selected='selected'>$i</option>";
            else 
            echo "<option>$i</option>";
        }
        
        echo  "</select><input type='hidden' name='titlu' value='{$_GET['titlu']}'><input type='submit' name='page'>
        </form></div>";
        }
        }   
           
    if(isset($_GET['sub'])){        
        
        
        
        $response = json_decode(file_get_contents("http://www.omdbapi.com/?s={$_GET['titlu']}&type={$_GET['type']}"),"true") ;
        
        
        
        
        for ($i=0;$i<count($response['Search']);$i++){
            $numeImg = explode("/",$response['Search'][$i]['Poster']);
            $nume = $numeImg[count($numeImg)-1];
            
            $imageString = file_get_contents($response['Search'][$i]['Poster']);
            $save = file_put_contents("filmImg/".$nume,$imageString);
            /*
            echo "<img src='filmImg/$nume' title='{$response['Search'][$i]['Title']}'><br>";
            
            echo $response['Search'][$i]['Title']."<br>";
            echo $response['Search'][$i]['Year']."<br>";
            
            $response['Search'][$i]['Title']=str_replace(" ","%20",$response['Search'][$i]['Title']);
            
            echo "
                <a href='film.php?titlu={$response['Search'][$i]['imdbID']}&movie={$response['Search'][$i]['Title']}&year={$response['Search'][$i]['Year']}'>Vezi mai mult ...</a><br>
            ";*/
            
            echo '
            <div class="holder">
            <img src="filmImg/'.$nume.'" title="'.$response['Search'][$i]['Title'].'">
            <div class="peste">
            <div class="tinator">
            <div class="titlu-film">
            '.$response['Search'][$i]['Title'].'
            </div>
            <div class="an-film">
            '.$response['Search'][$i]['Year'].'
            </div>
            <a href="single.php?titlu='.$response['Search'][$i]['imdbID'].'&movie='.$response['Search'][$i]['Title'].'&year='.$response['Search'][$i]['Year'].'">
            <span class="icon-circle-right"></span>
            </a>
            </div>
            </div>
            </div>

            ';
       }
        if($response['Response']=="False") echo "
<span class='not-found'>Filmul nu a fost gasit! Incercati alt keyword.</span>";
        if($response['totalResults']>10){
        echo "<div class='holder'><form class='paginatie'>Pagina:<select name='paging'>";
            
        for($i=1;$i<$response['totalResults']/10+1;$i++)
            echo "<option>$i</option>";
        
        
        echo  "</select><input type='hidden' name='titlu' value='{$_GET['titlu']}'><input type='submit' name='page'>
        </form></div>";
        
        }
                            
            
        } 
           
?>
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script>
$("input[type='submit']").click(function(e){
    e.preventDefault();
    var pagina = $("select[name='paging']").val();
    var pag = $("input[type='submit']").val();
    var title = $("input[type='hidden']").val();
    
    $.get("indexinc.php",{page: pag,paging:pagina,titlu:title},function(data){
        
        
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
    })
});
    
    

    
</script>