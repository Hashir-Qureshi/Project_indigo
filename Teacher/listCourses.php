<?php 

require_once(dirname(__DIR__).'/config/DB.connection.php');

$query = "SELECT * FROM courses";

$result = $conn->query($query);


	while($row = mysqli_fetch_assoc($result)){

		echo "<div id=".$row['Course_ID']."> 
		<h3>".$row['Course_Name']."</h3><br>
			<button href='addQuestion.php?Course_ID=".$row['Course_ID']."'>Edit Questions </button>&nbsp;
			<button href='createAssignment.php?Course_ID=".$row['Course_ID']."'> Create Assignment </button> <br>

			<button href='viewStatus.php?Course_ID=".$row['Course_ID']."'>View Status</button> &nbsp;
			<button href='vieweditAssignment.php?Course_ID=".$row['Course_ID']."'>View and Edit Assignments </button>
	 	</div>";



	}


?>