<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/Project_Indigo/config/DB.connection.php';

    //declaring variables to be used
    $error = $user = $pass = $query = $location = "";

//checking for post request
    if(isset($_POST['user'])){


            $user = $_POST['user'];
            $pass = intval($_POST['pass']);

            $user = htmlentities(mysqli_real_escape_string($conn, $user));
            $pass = htmlentities(mysqli_real_escape_string($conn, $pass));


            // checking to see if any fields are empty
            if ($user == "" || $pass == ""){
                $error = "Must specify an email and password<br>";
                echo $error;
            }else{

            //checking to see if the user checked the admin box
            if(isset($_POST['Admin'])){
                // if they did then we need to query the teachers table and set the next location to the teachers' hub
                $query = "SELECT Last_Name, Teacher_ID FROM teachers WHERE Last_Name = '$user' AND Teacher_ID = $pass";
                $location = 'Teacher/hub.php';
            }else{
                //if they didn't then we need to query the students table and set the next location to the students' hub
                $query = "SELECT Last_Name, Student_ID FROM students". " WHERE  Last_Name = '$user' AND Student_ID = $pass";
                $location = 'hub.php';
            }

                $response = $conn->query($query) or die($conn->error);



                $rows = $response->num_rows;

                //check to see if the query result brought back any rows
                if ($rows == 0){
                    //if it didn't, then the username or password don't exist in the database or are incorrect
                    $error = "Username/Password invalid<br>";
                    echo $error;
                }else{
                    //if it did, then the username and password exist in the database and are correct
                    //start the session for the user, save their information, log them in, and take them to their hub page.
                    session_start();
                    $_SESSION['user'] = $user;
                    $_SESSION['pass'] = $pass;
                    $_SESSION['loggedin'] = True;
                    header("location: $location");
                    exit;
                }
            }

}