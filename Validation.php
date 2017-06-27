<?php session_start();
if(!empty($_POST['question_1'])) {
    $answer = $_POST['question_1'];
     if($answer == $_SESSION['answers'][0]){
         echo "Correct!";
     }else echo "Wrong!";
}
