<?php

    session_start();
    $_SESSION['mevalid'] = false;
    echo $_SESSION['mevalid'] ;
    $_SESSION['myid'] = NULL;
    $_SESSION['myposition'] = NULL;

    header('Location: ../index.php');
    
?>