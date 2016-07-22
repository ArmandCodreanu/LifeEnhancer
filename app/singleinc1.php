<?php

if(isset($_GET['film'])){
    
    
    $query = "UPDATE users SET filme=CONCAT(filme,'{$_GET['filmid']}','_1{$_GET['nota']}+') WHERE email='{$_SESSION['email']}'";
    
    mysqli_query($link, $query);
    echo mysqli_error($link);
    echo "rahat";
    sleep(4);
    header("location: single.php?titlu={$_GET['titlu']}&movie={$_GET['movie']}&sub=Cauta");
}

?>