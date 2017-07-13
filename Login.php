<?php
    require 'includes/Authorization.php';
    if(isset($_GET["msg"])){
        echo $_GET["msg"];
    }

?>
<DOCTYPE html!>
    <html>
    <head>
        <title>Login Page</title>
    </head>
    <body>
    <div id ="frm">
        <form action ="" method="POST">
            <p>
                <label>Username:</label>
                <input type="text" id="user" name="user"/>
            </p>
            <p>
                <label>Password:</label>
                <input type="password" id="pass" name="pass"/>
            </p>
            <p>
                <input type="submit" id="" value="Submit"/>

            </p>

        </form>

    </div>


    </body>
    </html>