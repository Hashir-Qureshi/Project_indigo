<?php require_once 'config.php';

    //Creating a connection object that will be used to connect to the database anytime we need to.
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if($conn->errno){
        echo "Failed to connect to MySQL database ".$conn->error;
    }

