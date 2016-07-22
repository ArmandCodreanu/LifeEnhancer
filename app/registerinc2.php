<?php
            if($_POST['pass']!=$_POST['cpass']) echo "<span id='eroare'>Parolele nu coincid !</span>";
           if(!mysqli_query($link, $query)){
               echo mysqli_error($link);
               if (strpos(mysqli_error($link), 'uplicate') >-1) {
    echo "<span id='eroare'>E-mail nevalid !</span>";
                }
        
    }else{
        $_SESSION['cirese']="bicla";
        $_SESSION['poza']=$path;
        $_SESSION['email']=$_POST['email'];
        header("location:index.php");
        mysqli_close($link);
    }
            ?>