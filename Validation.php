<?php require_once 'Functions.php';
      require_once 'config/DB.connection.php';
session_start();


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

        if(sizeof($_SESSION['usedQuestions']) != $_SESSION['MaxQuestions']){
            query();
            $data['correct'] = true;
            $data['question'] = $_SESSION['question'];
            $data['answers'] = $_SESSION['answers'];
            $data['progress'] = sizeof($_SESSION['usedQuestions']);
        }else{
            $postGrade = "UPDATE students
                        SET HW_1_Grade = ".$_SESSION['score']."
                            WHERE Empl_ID = ".$_SESSION['pass'];

            $conn->query($postGrade);
        }
        // Choose a new question and its answers and set the correct key to true


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
            // Choose a new question

                $_SESSION['try'] = 0;
            query();
            $data['correct'] = false;
            $data['question'] = $_SESSION['question'];
            $data['answers'] = $_SESSION['answers'];
            $data['progress'] = sizeof($_SESSION['usedQuestions']);

        }

    }

        echo json_encode($data);

























