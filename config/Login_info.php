<?php
//Holds all the credentials for the database.

$servername = "localhost";
$username = "root";
$password = "Qureshi1452";
$dbname = "project indigo";

//Creating a connection object that will be used to connect to the database anytime we need to.
$conn = new mysqli($servername, $username, $password, $dbname);
