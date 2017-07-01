<?php session_start();
if(!empty($_POST['check'])) {
    $answer = $_POST['question_1'];
    if($answer == $_SESSION['answers'][0]){
        if($_SESSION['try'] == 1){
            $_SESSION['status'] = "Correct";
            $_SESSION['try'] = 0;
            $_SESSION['score'] += .75;

        }else {
            $_SESSION['status'] = "Correct";
            $_SESSION['score'] += 1;
        }
        if(sizeof($_SESSION['usedQuestions']) != 5){
            header('location: Assignment_1.php');
            exit;
        }else{
            header('location: Confirmation.php');
            exit;
        }

    }else {
        if($_SESSION['try'] == 0) {
            $_SESSION['try'] = 1;
            $_SESSION['status'] = "Wrong! Try 1 more time for .75 points";
            header('location: Assignment_1.php');
            exit;
        }else {
            if(sizeof($_SESSION['usedQuestions']) != 5){
                $_SESSION['try'] = 0;
                $_SESSION['status'] = "";
                header( 'location: Assignment_1.php');
                exit;
            }else {
                header('location: hub.php');
                exit;
            }

        }
    }
}
