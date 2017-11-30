<?php 

require_once(dirname(__DIR__).'/config/DB.connection.php');

$query = "SELECT * FROM courses";

$result = $conn->query($query);


	while($row = mysqli_fetch_assoc($result)){
		
		echo " 


		

		<div class='row card d-flex justify-content-center'> 
			<h3 class='card-header text-center'>".$row['Course_Name']."</h3> <br>
		
		<div class='card-block p-2'>

			&nbsp;

		    <a href='addQuestions.php?Course_ID=".$row['Course_ID']."' class='btn btn-primary'>Edit Questions</a> &nbsp;		

			<a href='addQuestions.php?Course_ID=".$row['Course_ID']."' class='btn btn-primary'>Add Questions </a>&nbsp;

			<a href='createAssignment.php?Course_ID=".$row['Course_ID']."' class='btn btn-primary'> Create Assignment </a> &nbsp; 

			<a href='vieweditAssignment.php?Course_ID=".$row['Course_ID']."' class='btn btn-primary'>View/Edit Assignments </a> 
		    
		</div>	
	 	</div>
	 	
	 	
	 	<br>


	 	 "
	 	

	 	;



	}

//	&nbsp; <a href='viewStatus.php?Course_ID=".$row['Course_ID']."' class='btn btn-primary'>View Status</a> &nbsp;
?>