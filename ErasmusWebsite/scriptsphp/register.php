<?php

 function register()
{
    session_start();
    
    if ( !isset($_SESSION['username']) && !isset($_SESSION['password']) ) {
        // User is not authenticated, redirect to sign-up.php
        header("Location: sign-up.php");
        exit();
    } else {
        // User is authenticated, redirect to application.php
        //header("Location: application.php");//loop redirection problem if we uncomment this line
                                              //but this is where it redirect us
        //exit();
    }
}
?>