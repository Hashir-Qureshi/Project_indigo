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
<head>
	<title>Hub Page</title>
</head>
<body>
Welcome to the Hub Page <?php echo ucfirst($result['First_Name'])." ".ucfirst($result['Last_Name']); ?> 
</br>
<form action="" method="POST">
	<button type="submit" name="logout">Logout</button></br>
</form>
<form action="addQuestions.php">
<button>Add Questions</button>
</form>
</body>
</html>