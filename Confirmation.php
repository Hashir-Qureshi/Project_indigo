<?php
require 'Login.confirmation.php';
                 if(isset($_POST['logout'])) {
                     if (isset($_SESSION['user'])) {
                         session_destroy();
                     }
                     echo "You have been logged out";
                     header('location: Login.php');
                 }

?>
<!Doctype html>
<html>
    <head>
        <title>Confirmation</title>
    </head>
    <body>
        <h1>YOU HAVE COMPLETED THE ASSIGNMENT <?php echo $_SESSION['choice'];?></h1>
        <h4>Your Score was <?php echo $_SESSION['score']; ?></h4>
        <button onclick="location.href='hub.php'" type="button" >
           Back to Hub</button>
        <form action="" method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    </body>
</html>
