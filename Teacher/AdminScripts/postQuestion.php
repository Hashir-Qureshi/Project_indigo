<?php 

require_once('../../config/DB.connection.php');

$data = trim(file_get_contents("php://input"));

$data = json_decode($data, true);

$response = array("chapter" => '',
					"points" => '',
					"questionNum" => '',
					"part" => '',
					"question" => '',
					"answer" => '',
					"hint" => ''
);



$chapter = mysqli_real_escape_string($conn, $data['chapter']);
$points = mysqli_real_escape_string($conn, $data['points']);
$questionNum = mysqli_real_escape_string($conn, $data['questionNum']);
$part = mysqli_real_escape_string($conn, $data['part']);
$question = mysqli_real_escape_string($conn, $data['question']);
$correctAnswer = mysqli_real_escape_string($conn, $data['answer']);
$hint = mysqli_real_escape_string($conn, $data['hint']);
$wrongAnswers = array();

for ($i=0; $i < sizeof($data['wrongAnswers']); $i++) { 
	$wrongAnswers[$i] = mysqli_real_escape_string($conn, $data['wrongAnswers'][$i]);
}

$response['chapter'] = gettype($chapter);
$response['points'] = gettype($points);
$response['questionNum'] = gettype($questionNum);
$response['part'] = gettype($part);
$response['question'] = gettype($question);
$response['answer'] = gettype($correctAnswer);
$response['hint'] = gettype($hint);

// $conn->autocommit(FALSE);

// $conn->begin_transaction();



// $query_1 = " INSERT INTO questions (Chapter, Question_Num, Part_Num, Question, Hint, Points) VALUES ($chapter, $questionNum, $part, '$question', '$hint', $points)";

// $result_1 = $conn->query($query_1);

// $response['error'] = mysqli_error($conn);

// $question_ID = $conn->insert_id();

// $query_2 = " INSERT INTO answers (Q_ID, Chapter, Question_Num, Part_Num, Correct, Answer) VALUES ($question_ID, $chapter, $questionNum, $part, 1, '$correctAnswer')"

// $result_2 = $conn->query($query_2);


// foreach ($wrongAnswers as $answer) {
// 	$query_3 = " INSERT INTO answers (Q_ID, Chapter, Question_Num, Part_Num, Correct, Answer) VALUES ($question_ID, $chapter, $questionNum, $part, 0, '$answer')";

// 	$result_3 = $conn->query($query_3);

// 	if (!$result_3) {
// 		break;
// 	}

// }


// if($result_1 && $result_2 && $result_3){
// 	$conn->commit();
// 	$response['success'] = true;
// }else{
// 	$conn->rollback();
// 	$response['error'] = $conn->error();
// }



echo json_encode($response);


?>