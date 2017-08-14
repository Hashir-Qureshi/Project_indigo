<?php
spl_autoload_register(function($class){
    include $class.'.class.php';
});

require 'Login.confirmation.php';

$assignment = $_SESSION['assignment']; 

require_once 'config/DB.connection.php';


    if(isset($_POST['logout'])) {
        if (isset($_SESSION['user'])) {
            session_destroy();
        }
        echo "You have been logged out";
        header('location: Login.php');
    }

    $query = "SELECT HW_".$_SESSION['choice']."_Grade from students WHERE Empl_ID = ".$_SESSION['pass'];
    $results = $conn->query($query);

    $results = $results->fetch_array(MYSQLI_NUM);

    ?>
    <!Doctype html>
    <html>
        <head>
            <title>Confirmation</title>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title> Assignment </title>
            <!-- Bootstrap -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="JavaScript/jquery-3.2.1.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
            <script src="JavaScript/Validation.js"></script>
            <link rel="stylesheet" href="CSS/assignment.css">
            <link href="css/Header.css" rel="stylesheet">
        </head>
        <body>
        <?php include "header.php";?>

        <div class="container" style="font-family: 'Zilla Slab', Serif; margin-top: 50px;">
            <div class="row">
                <div class="wrap-assignment col-md-10 offset-md-1 card alert alert-success" style="margin-top:150px;">
                    <div class="card-header alert-heading" style="text-align: center;">
                        <h1>YOU HAVE COMPLETED ASSIGNMENT <?php echo $_SESSION['choice'];?></h1>
                    </div>
                    <div class="card-block" style="text-align: center;">
                        <h4 >You Scored <?php echo $results[0] ?> out of <?php echo $assignment->getMaxQuestions(); ?></h4>

                        <button onclick="location.href='hub.php'" type="button" class="btn btn-assignment btn-default btn-primary btn-lg">Back to Hub</button>
                    </div>
                </div>
            </div>
        </div>
        </body>
    </html>
