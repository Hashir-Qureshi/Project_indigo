<?php session_start(); ?>
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
    </body>
</html>
