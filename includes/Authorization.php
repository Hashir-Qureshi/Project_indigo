<?php
    require_once '../config/DB.connection.php';

    $error = $user = $pass = "";

    if (isset($_POST['user']))
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $user = htmlentities(mysqli_real_escape_string($user));
        $pass = htmlentities(mysqli_real_escape_string($pass));



        if ($user == "" || $pass == ""){
            $error = "Not all fields were entered<br>";
            echo $error;
        }else{

            $query = "SELECT Last_Name, Empl_ID FROM students". " WHERE  Last_Name = '$user' AND Empl_ID = $pass";
            $response = $conn->query($query) or die($conn->error);



            $rows = $response->num_rows;

            if ($rows == 0){

                $error = "Username/Password invalid<br>";
                echo $error;
            }else{

                session_start();
                $_SESSION['user'] = $user;
                $_SESSION['pass'] = $pass;
                header( 'location: hub.php');
                exit;
            }
        }
    }
