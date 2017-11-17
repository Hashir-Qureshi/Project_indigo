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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="../JavaScript/teacherHub.js"></script>

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