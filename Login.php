<?php
    require 'includes/Authorization.php';
    if(isset($_GET["msg"])){
        echo $_GET["msg"];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Page</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- CSS stylesheet -->
    <link rel="stylesheet"  type="text/css" href="CSS/Loginstylesheet.css">
    <!-- Fonts -->
    <link href="fonts/" type="images">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="JavaScript/jquery-3.2.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    
</head>

<body>
<div class="container">
    <div class="row">
        <div class="wrap-login col-md-4 offset-md-4 ">
            <div class="" style="background-color: #283593; padding:5px; padding-top:8px; margin-bottom: 30px; border-radius: 5px;">
                <h2 class="text-center" style=" font-family:'Roboto', sans-serif; font-weight: bold; color:#fff;">C.H.E.S.S</h2>
                <div class="text-center" style=" margin-top: 0;font-family:'Roboto', sans-serif; font-weight: bold; color:#fff;">Computerized Homework Exercise SyStem</div>
            </div>

            <form action="Login.php" method="POST">
                <div class="form-group">
                    <label>
                        <input type="text" id="imputEmail" class="form-control" placeholder="Enter Username" name="user"/>
                        Username
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Enter Password" name="pass"/>
                        Password
                    </label>
                </div>
                <button type="submit" class="btn-login btn btn-default btn-primary btn-block">Log in</button>
            </form>
        </div>


    </div>
</div>

</body>

</html>