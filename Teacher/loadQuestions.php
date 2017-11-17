<?php 

require_once(dirname(__DIR__).'/config/DB.connection.php');

sleep(1);

$filter = $_POST['filter'];

$query = "SELECT * FROM questions WHERE Chapter = $filter";

$result = $conn->query($query);

if ($result != false) {
	while($row = mysqli_fetch_assoc($result)){

		echo "<tr><td>".$row['Chapter']."</td>";
		echo "<td>".$row['Question_Num']."</td>";
		echo "<td>".$row['Question']."</td>";
		echo "<td>".$row['Hint']."</td>";
		echo "<td>".$row['Part_Num']."</td>";
		echo "<td>".$row['Points']."</td></tr>";

	}
} 

?>