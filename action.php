<?php
require_once 'Login_info.php';
session_start();
$error = $user = $pass = "";
global $conn;

$user = $_POST['user'];
$pass = $_POST['pass'];


if (isset($_POST['user']))
{
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if ($user == "" || $pass == ""){
        $error = "Not all fields were entered<br>";
        echo $error;
       include 'Login.php';

    }
    else
    {
        $query = "SELECT Last_Name, Empl_ID FROM students". " WHERE  Last_Name = '$user' AND Empl_ID = $pass";
        $response = $conn->query($query) or die($conn->error);



        $rows = $response->num_rows;

        if ($rows == 0)
        {
            $error = "Username/Password invalid<br>";
            echo $error;
            include 'Login.php';
        }
        else
        {
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            header( 'location: hub.php');
            exit;
        }
    }
}
