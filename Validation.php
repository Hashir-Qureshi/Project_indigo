<?php session_start();
/*
        $_SESSION['attemptedAnswer'] = true;

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
                header('location: Assignment.php');
                exit;
            }else{

                header('location: Confirmation.php');
                exit;
            }



        }else {

            if($_SESSION['try'] == 0) {
                $_SESSION['try'] = 1;
                $_SESSION['status'] = "Wrong! Try 1 more time for .75 points";
                header('location: Assignment.php');
                exit;
            }else {

                if(sizeof($_SESSION['usedQuestions']) != 5){
                    $_SESSION['try'] = 0;
                    $_SESSION['status'] = "";
                    header( 'location: Assignment.php');
                    exit;
                }else {

                    header('location: Confirmation.php');
                    exit;
                }

            }
        }
*/

    $answer = $_POST['answer'];

    /*
     data array that will be sent back as the response
     Contains information about the current state of the assignment such as the check for the answer,
     the question to be displayed to the user, the answers of the question, and the progress of the user*/
    $data = array(
        'correct' => false,
        'question' => $_SESSION['question'],
        'answers' => $_SESSION['answers'],
        'progress' => sizeof($_SESSION['usedQuestions'])
    );

    if($answer === $_SESSION['answers'][0]){
        // The user answered correctly

        if($_SESSION['try'] == 1){
            // This was the user's second attempt
            // Reset tries and give the user partial credit

            $_SESSION['try'] = 0;
            $_SESSION['score'] += .75;

        }else {
            // This was the user's first attempt
            // Give the user full credit

            $_SESSION['score'] += 1;
        }

        // Choose a new question and its answers and set the correct key to true
        query();
        $data['correct'] = true;

    }else{
        // The user answered incorrectly

        if($_SESSION['try'] == 0) {
            // This was the user's first attempt
            // Set try to 1
            $_SESSION['try'] = 1;
        }else {
            // This was the user's second attempt
            // Reset try to 0 and don't increase the score
            // The user gets 0 points for answering the same question wrong twice

                $_SESSION['try'] = 0;
        }

    }


        echo json_encode($data);

























