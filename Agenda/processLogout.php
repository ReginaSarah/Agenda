<?php

    session_start();
    $token = md5(session_id());

    if(isset($_SESSION['login']) && isset($_SESSION['senha']) == $token) {
        //unset($_SESSION('nome'));
       // unset($_SESSION('login'));
        //unset($_SESSION('senha'));

        session_destroy();

        header("location: index.php");
        exit();
    } else {
        echo '<a href="doLogout.php?token='.$token.'>Confirmar logout</a>';
    }

?>