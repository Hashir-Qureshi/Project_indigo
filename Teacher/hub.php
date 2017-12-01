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
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <link href="../css/Header.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="../JavaScript/teacherHub.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">">
<script 
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>	  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<body>
	 <?php include(dirname(__DIR__).'/header.php'); ?>
	
 	<div class="container" style="margin-top: 125px; margin-bottom: 50px;">

 		<div class="row d-flex justify-content-center">

 			<div class="wrapper" id="profile"><img src="https://www.w3schools.com/w3images/fjords.jpg" style="width:250px; height:250px;" class="rounded-circle"> 
 			</div>

         </div>

  
  <div class="row d-flex justify-content-center" >

  	<div class="replacer  mt-4 mb-2"> 


  	<button class="btn btn-primary" value="Add Course" id="addCourse">Add Course</button>
	</div>



  </div>




 <div class="row d-flex justify-content-center">
  	<div class="courseList" id="courseList">


 	</div>
 </div>


</div>

 </body>
</html>