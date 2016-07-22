<?php
           
   
        $f = explode("+",$v[0]);
    $cate=0;
    for($i=0;$i<count($f);$i++){
        if(substr($f[$i],10,1)){
            $cate++;
            $id = substr($f[$i],0,9);
            
            $nr = substr($f[$i],11,1);
            
            $response =  json_decode(file_get_contents("http://www.omdbapi.com/?i=$id"),"true") ;
            
            $numeImg = explode("/",$response['Poster']);
            $nume = $numeImg[count($numeImg)-1];
            
            $imageString = file_get_contents($response['Poster']);
            $save = file_put_contents("filmImg/".$nume,$imageString);
            /*echo "<a href='film.php?titlu={$response['imdbID']}'>";
            echo "<img src='filmImg/$nume' title='{$response['Title']}'><br>";
            
            echo $response['Title'];
            echo "</a>";
            if($nr==1)
            echo"<div class=stele><span><input type='radio' name='nota$i' value='1' checked disabled><i></i>";
        else
            echo"<div class=stele><span><input type='radio' name='nota$i' value='1' required disabled><i></i>";
        if($nr==2)
            echo"<input type='radio' name='nota$i' value='2' checked disabled><i></i>";
        else
            echo"<input type='radio' name='nota$i' value='2' disabled><i></i>";
        if($nr==3)
            echo"<input type='radio' name='nota$i' value='3' checked disabled><i></i>";
        else
            echo"<input type='radio' name='nota$i' value='3' disabled><i></i>";
        if($nr==4)
            echo"<input type='radio' name='nota$i' value='4' checked disabled><i></i>";
        else
            echo"<input type='radio' name='nota$i' value='4' disabled><i></i>";
        if($nr==5)
            echo"<input type='radio' name='nota$i' value='5' checked disabled><i></i></span></div>";
        else
            echo"<input type='radio' name='nota$i' value='5' disabled><i></i></span></div></div>";
            */
            
            echo '
            
             <div class="watched">
                 <img src="filmImg/'.$nume.'" alt="">
                 <div class="movie-title">'.$response['Title'].'</div>
                 <div class="movie-year">'.$response['Year'].'</div>
                 <div class="movie-stars">';
        if($nr==1)
            echo"<span><input type='radio' name='nota$i' value='1' checked='checked' disabled='disabled'><i></i>";
        else
            echo"<span><input type='radio' name='nota$i' value='1' disabled='disabled'><i></i>";
        if($nr==2)
            echo"<input type='radio' name='nota$i' value='1' checked='checked' disabled='disabled'><i></i>";
        else
            echo"<input type='radio' name='nota$i' value='1' disabled='disabled'><i></i>";
        if($nr==3)
            echo"<input type='radio' name='nota$i' value='1' checked='checked' disabled='disabled'><i></i>";
        else
            echo"<input type='radio' name='nota$i' value='1' disabled='disabled'><i></i>";
        if($nr==4)
            echo"<input type='radio' name='nota$i' value='1' checked='checked' disabled='disabled'><i></i>";
        else
            echo"<input type='radio' name='nota$i' value='1' disabled='disabled'><i></i>";
        if($nr==5)
            echo"<input type='radio' name='nota$i' value='1' checked='checked' disabled='disabled'><i></i></span>";
        else
            echo"<input type='radio' name='nota$i' value='1' disabled='disabled'><i></i></span>";
                  
                 
                      echo'</div>
                 <div class="movie-link">
                     <a href="single.php?titlu='.$response['imdbID'].'&movie='.$response['Title'].'&filmid='.$response['imdbID'].'">Go to movie >></a>
                 </div>
                 <div class="clear"></div>
            </div>
            
            ';
            
        }
    }
           
           ?>