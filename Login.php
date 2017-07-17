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
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <!-- CSS stylesheet -->
    <link rel="stylesheet"  type="text/css" href="CSS/Loginstylesheet.css">
    <!-- Fonts -->
    <link href="/fonts/Roboto" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/JavaScript/jquery-3.2.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="JavaScript/bootstrap.min.js"></script>
    
</head>

<body>
<div class="container">
    <div class="row">
        <div class="wrap-login col-md-4 col-md-offset-4 ">
            <h2 class="text-center" style="margin-bottom: 30px; font-family:'Roboto', sans-serif; font-weight: bold; color:#283593;">CHESS</h2>
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

        <div class= "row">

        </div>

    </div>
</div>

</body>

</html>