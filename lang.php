<?php
    // Check if session start
    if(!isset($_GET['lang'])){
        if(!isset($_SESSION['lang'])){
            $_SESSION['lang'] = 'en';
        }
    }else{
        if($_GET['lang'] == 'ar')
            $_SESSION['lang'] = 'ar';
        else if($_GET['lang'] == 'en')
            $_SESSION['lang'] = 'en';
    }
?>