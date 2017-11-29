<?php 

require_once('../../config/DB.connection.php');

$data = trim(file_get_contents("php://input"));

$data = json_decode($data, true);




$chapter = mysqli_real_escape_string($conn, $data['chapter']);
$points = mysqli_real_escape_string($conn, $data['points']);
$part = mysqli_real_escape_string($conn, $data['part']);
$question = mysqli_real_escape_string($conn, $data['question']);
$correctAnswer = mysqli_real_escape_string($conn, $data['answer']);
$hint = mysqli_real_escape_string($conn, $data['hint']);
$wrongAnswers = array();

for ($i=0; $i < sizeof($data['wrongAnswers']); $i++) { 
	$wrongAnswers[$i] = mysqli_real_escape_string($conn, $data['wrongAnswers'][$i]);
}




	






?>