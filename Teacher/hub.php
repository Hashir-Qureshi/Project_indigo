<?php require_once(dirname(__DIR__).'/config/DB.connection.php'); 
session_start(); 

	$query = "SELECT First_Name, Last_Name FROM teachers WHERE Teacher_ID = ".$_SESSION['pass'];

	$result = $conn->query($query);
	$result = $result->fetch_array(MYSQLI_ASSOC);
	
//Logout 
	if(isset($_POST['logout'])){
        if(isset($_SESSION['user'])){
            session_destroy();
            echo "You have been logged out";
            header ("location: /project_indigo/Login.php");
        }
    }

?>
<!DOCTYPE html>
<html>
<head> </head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="../JavaScript/teacherHub.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

<body>

 
 	<div class="wrapper" id="profile"><img src="https://pics.onsizzle.com/astronomeme-my-astronomy-binder-2725677.png"  style="width: 500px;height: 300px;"> 
 	</div>


  
  <div class="replacer" align="center"> 

  	<input type="button" value="Add Course" id="addCourse"> <br/>

  </div>


  <div class="courseList" id="courseList">
 	


  </div>





 </body>
</html>