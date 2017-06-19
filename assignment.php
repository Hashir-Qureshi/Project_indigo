<?php
    $servername = "localhost";
    $username = "";
    $password = "";
    $dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$Q_ID = rand(1,5);
$query = "SELECT Question FROM ch_1 WHERE ID=$Q_ID";
$A_query = "SELECT Answer,W_Answer_1,W_Answer_2,W_Answer_3 FROM ch_1 WHERE ID=$Q_ID";

$question = $conn->query($query);
$question = $question->fetch_array(MYSQLI_NUM);

$results = $conn->query($query);
$results = $results->fetch_array(MYSQLI_NUM);

echo json_encode(array($question, $results));

?>
