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
            require 'Assignment_1.php';
        }else{
            echo "<h1> YOU HAVE COMPLETED THE ASSIGNMENT ".$_SESSION['choice'];
            require 'hub.php';
        }

    }else {
        if($_SESSION['try'] == 0) {
            $_SESSION['try'] = 1;
            $_SESSION['status'] = "Wrong! Try 1 more time for .75 points";
            require 'Assignment_1.php';
        }else {
            $_SESSION['try'] = 0;
            $_SESSION['status'] = "";
            require 'Assignment_1.php';
        }
    }
}
if(isset($_POST['change'])){
    if(sizeof($_SESSION['usedQuestions']) != 5) {
        require 'Assignment_1.php';
        echo sizeof($_SESSION['usedQuestions']);
    }else{
        echo "<h1> YOU HAVE COMPLETED THE ASSIGNMENT ".$_SESSION['choice'];
        require 'hub.php';
    }
}
