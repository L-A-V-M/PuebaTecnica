<?php

    define("CLIENT_ID","AYBz55S81XRQXk3y2LJ1708AQLAhBStJqZ-e46Qvb6kTA30WzEkHhtA7c1qK1p9vuG0nw-VE1H8VyhoY");
    define("CURRENCY","MXN");
    define("KEY_TOKEN","ACB-12?");
    session_start();
    //session_destroy();

    $num_cart =0;
    if(isset($_SESSION['carrito']['productos'])){
        $num_cart = count($_SESSION['carrito']['productos']);
        
    }
?>