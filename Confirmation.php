<?php require_once 'config/DB.connection.php';

    require 'Login.confirmation.php';

    if(isset($_POST['logout'])) {
        if (isset($_SESSION['user'])) {
            session_destroy();
        }
        echo "You have been logged out";
        header('location: Login.php');
    }

    $query = "SELECT HW_1_Grade from students WHERE Empl_ID = ".$_SESSION['pass'];
    $results = $conn->query($query);

    $results = $results->fetch_array(MYSQLI_NUM);

    ?>
    <!Doctype html>
    <html>
        <head>
            <title>Confirmation</title>
        </head>
        <body>
            <h1>YOU HAVE COMPLETED THE ASSIGNMENT <?php echo $_SESSION['choice'];?></h1>
            <h4>Your Score was <?php echo $results[0] ?></h4>
            <button onclick="location.href='hub.php'" type="button" >
               Back to Hub</button>
            <form action="" method="POST">
                <input type="submit" name="logout" value="Logout">
            </form>
        </body>
    </html>
