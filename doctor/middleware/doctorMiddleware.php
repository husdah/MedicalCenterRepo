<?php

session_start();

if(isset($_SESSION['auth']))
{
    if($_SESSION['role_as'] !=1){
       /*  redirect('../home.php',"You Are Not Authorized To Access This Page!"); */

       if($_SESSION['role_as'] == 0){
        header('Location: ../admin/dashboard.php');
       }else{
        header('Location: ../home.php');
       }
    }
}else{
    /* redirect('../sign-in-up.php',"Login to continue"); */
    header('Location: ../sign-in-up.php');
}

?>