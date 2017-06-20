<?php
    $servername = "localhost";
    $username = "root";
    $password = "Qureshi1452";
    $dbname = "project indigo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$Q_ID = rand(1,5);
$query = "SELECT Question FROM CH_1 WHERE Q_ID=$Q_ID";
$A_query = "SELECT Answer,W_Answer_1,W_Answer_2,W_Answer_3 FROM CH_1 WHERE Q_ID=$Q_ID";

$question = $conn->query($query);
$question = $question->fetch_array(MYSQLI_NUM);

$results = $conn->query($A_query);
$results = $results->fetch_array(MYSQLI_NUM);

echo json_encode(array($question[0],$results));


?>
