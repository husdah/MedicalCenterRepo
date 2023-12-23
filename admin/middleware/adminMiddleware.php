<?php

/* include("functions/validate.php"); */

if(isset($_SESSION['auth']))
{
    if($_SESSION['role_as'] !=0){

        if($_SESSION['role_as'] == 1){
            redirect('../doctor/dashboard.php',"You Are Not Authorized To Access This Page!");
        }else{
            redirect('../home.php',"You Are Not Authorized To Access This Page!");
        }
       
    }

}else{
    redirect('../sign-in-up.php',"Login to continue");
}

?>