<?php
session_start();

/*     session_start();
    session_unset();
    session_destroy();
    header("Location: sign-in-up.php"); */

    if($_SESSION['auth'])
    {
        unset($_SESSION['auth']);
        unset($_SESSION['auth_user']);
       /*  $_SESSION['message']="Logged Out Successfully"; */
    }

    header('Location: sign-in-up.php');

?>