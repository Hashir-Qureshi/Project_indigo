<?php require_once 'config/DB.connection.php';
    session_start();
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
        </body>
    </html>
