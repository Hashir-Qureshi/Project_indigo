<?php 

require_once('../../config/DB.connection.php');

sleep(1);

if (isset($_POST['filter'])) {
    $query = "SELECT * FROM questions order by Chapter";
} else {
    $chapter = $_POST['chapter'];
    $points = $_POST['points'];
    $query = "SELECT * FROM questions WHERE Chapter = $chapter AND Points = $points";
}

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