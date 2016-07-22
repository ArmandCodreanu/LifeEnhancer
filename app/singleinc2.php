<?php
require_once("inc/conn.php");

        /*
        
        
        
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@COMMENTARIILE@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@NOTELE@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        
        
        
        
        
        */

    if(isset($_GET['film']) || isset($_GET['titlu'])){
        
       $sql="SELECT * FROM movies WHERE imdbID='{$_GET['titlu']}'";
        $res=mysqli_query($link, $sql);
        
        if(!mysqli_num_rows($res)){
            $sql = "INSERT INTO movies (imdbID) VALUES(
                    '{$_GET['titlu']}'
                    )";
            $res=mysqli_query($link, $sql);
            echo mysqli_error($link);
        }
        
        $commdepus = mysqli_fetch_row($res);
        
        $response = json_decode(file_get_contents("https://www.omdbapi.com/?i={$_GET['titlu']}"),"true") ;
        
        if(!$response['Response']){
            echo "<span id=bleh>Nu am gasit acest film. Incercati alta cautare...</span>";
        }else {
            
        $query = "SELECT filme FROM users WHERE email='{$_SESSION['email']}'";
        $res = mysqli_query($link, $query);
        $v = mysqli_fetch_row($res);
        
        $f = explode("+",$v[0]);
        $key[0] =$response['imdbID']."_11";
        $key[1] =$response['imdbID']."_12";
        $key[2] =$response['imdbID']."_13";
        $key[3] =$response['imdbID']."_14";
        $key[4] =$response['imdbID']."_15";
          $ok=0;
        for($i=0;$i<5;$i++){
            if(in_array($key[$i],$f)){ $vazut=1;$ok=1;$nr = $i+1;}
                
        }        
        
        if(!$ok)$vazut=0;
            
            $numeImg = explode("/",$response['Poster']);
            $nume = $numeImg[count($numeImg)-1];
            
            $imageString = file_get_contents($response['Poster']);
            $save = file_put_contents("filmImg/".$nume,$imageString);
            
            echo '
            
<div class="left">
<div class="single-img">
<img src="filmImg/'.$nume.'" alt="">
</div>
<div class="single-title">'.$response["Title"].'</div>
<div class="single-year">'.$response["Year"].'</div>
<div class="single-brief">
'.$response["Plot"].'
</div>
<div class="comment-holder">
'.$commdepus[1].'
</div>
<div class="comm-form">
<div class="form-title">Scrie un comentariu</div>
<form action="">
<input type="hidden" name="filmid" value="'.$response["imdbID"].'">
<input type="hidden" name="titlu" value="'.$response["imdbID"].'">
<input type="hidden" name="movie" value="'.$response["Title"].'">
<textarea placeholder="Comentariu" name="comment"></textarea>
<input type="submit" name="marmelada" value="Scrie un comentariu">
</form>
</div>
</div>
<div class="separat"></div>
<div class="right">
<div class="right-title">Movie info</div>
<div class="right-info"><span class="icon-bookmarks"></span><span class="bold">Note:</span><span class="add">'.$response["Rated"].'</span></div>
<div class="right-info"><span class="icon-calendar"></span><span class="bold">Released:</span><span class="add">'.$response["Released"].'</span></div>
<div class="right-info"><span class="icon-film"></span><span class="bold">Duration:</span><span class="add">'.$response["Runtime"].'</span></div>
<div class="right-info"><span class="icon-ticket"></span><span class="bold">Genre:</span><span class="add">'.$response["Genre"].'</span>i</div>
<div class="right-info"><span class="icon-briefcase"></span><span class="bold">Director:</span><span class="add">'.$response["Director"].'</span></div>
<div class="right-info"><span class="icon-users"></span><span class="bold">Actors:</span><span class="add">'.$response["Actors"].'</span></div>
<div class="right-info"><span class="icon-heart"></span><span class="bold">IMDb Rating:</span><span class="add">'.$response["imdbRating"].'</span></div>
<div class="form-stars">
<form action="">';
             if(!$vazut) echo  '<p>Not Watched!</p><span><input type="radio" name="nota" value="1" required=""><i></i><input type="radio" name="nota" value="2"><i></i><input type="radio" name="nota" value="3"><i></i><input type="radio" name="nota" value="4"><i></i><input type="radio" name="nota" value="5"><i></i></span>
<input type="hidden" name="filmid" value="'.$response["imdbID"].'">
<input type="hidden" name="titlu" value="'.$response["imdbID"].'">
<input type="hidden" name="movie" value="'.$response["Title"].'">
<input type="submit" name="film" value="Mark as watched">    ';
          
                
                    else{
                        echo '<p>Watched!</p>';
                        if($nr==1)
            echo"<span><input type='radio' name='nota' value='1' checked><i></i>";
        else
            echo"<span><input type='radio' name='nota' value='1' required><i></i>";
        if($nr==2)
            echo"<input type='radio' name='nota' value='2' checked><i></i>";
        else
            echo"<input type='radio' name='nota' value='2'><i></i>";
        if($nr==3)
            echo"<input type='radio' name='nota' value='3' checked><i></i>";
        else
            echo"<input type='radio' name='nota' value='3'><i></i>";
        if($nr==4)
            echo"<input type='radio' name='nota' value='4' checked><i></i>";
        else
            echo"<input type='radio' name='nota' value='4'><i></i>";
        if($nr==5)
            echo"<input type='radio' name='nota' value='5' checked><i></i></span>";
        else
            echo"<input type='radio' name='nota' value='5'><i></i></span>";
                     } 
            echo '

                              
</form>
</div>';
            
            include("movietrailer.php");

                echo'
</div>
<div class="clear"></div>

            ';
            
        }
    }
    
    if(isset($_GET['marmelada'])&&!empty($_GET['comment'])){            
            $sql="SELECT comments FROM movies WHERE imdbID='{$_GET['filmid']}'";
            $res=mysqli_query($link, $sql);
            echo mysqli_error($link);
            $comm = mysqli_fetch_row($res);
            
            $_GET['comment'] = htmlspecialchars($_GET['comment'], ENT_QUOTES);
            
           /* $_GET['comment'] = "<div class=mail-comm>".$_SESSION['email']."</div><div class=msg-comm>".$_GET['comment']."</div>";
            $toUp=$comm[0].$_GET['comment'];*/
            
            $_GET['comment'] = '
                <div class="comment">
                <div class="comm-img"><img src="'.$_SESSION['poza'].'" alt="Profile picture"></div>
                <div class="comm-name">'.$_SESSION['email'].'</div>
                <div class="comm-msg">'.$_GET['comment'].'</div>
                </div>';
        
            $toUp=$comm[0].$_GET['comment'];

            $sql="UPDATE movies SET comments='$toUp' WHERE imdbID='{$_GET['filmid']}'";
            $res=mysqli_query($link, $sql);
            echo "&nbsp;";
    
            $url ="single.php?titlu={$_GET['filmid']}&filmid={$_GET['filmid']}&movie={$_GET['movie']}";
             $string = '<script type="text/javascript">';
            $string .= 'window.location.replace("' . $url . '")';
            $string .= '</script>';

            echo $string;
        
        

    }
    
           

?>