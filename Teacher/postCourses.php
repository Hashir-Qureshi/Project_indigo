<?php
session_start();

require_once(dirname(__DIR__).'/config/DB.connection.php');


$courseName = "";
$courseNum = "";

$response = array(
	'success' => false

);



 if(isset($_POST['courseName'])){

    $courseName = mysqli_real_escape_string($conn, $_POST['courseName']);
    $courseNum = mysqli_real_escape_string($conn, $_POST['courseNum']);
    

    
    $sql  = "INSERT INTO courses (Course_Name, Course_Num) VALUES ('$courseName', $courseNum)";
        
        
        $result = $conn->query($sql);
       
   if (  $result === TRUE ){
    	
    	$response['success'] = true;

    
        }


echo json_encode($response);



 };
