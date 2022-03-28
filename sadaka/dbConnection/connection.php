<?php

    $username = 'orphanage1';
    $password = 'dbms';
    $connection_string = 'localhost/xe';
    $connection = oci_connect($username,$password,$connection_string);


    if(!$connection){
        echo "<h3 class='container my-3 text-center bg-dark text-white rounded-lg p-3'>Unable to establish connection to Database</h3>";
    }

?>