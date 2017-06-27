<?php require_once "Login_info.php";


function question(){
    echo "<h2 id='question_1'>". $_SESSION['question'][0]."</h2>";
}

function answers(){
    $answers = $_SESSION['answers'];
    for($i =0;$i<4;$i++){
        $A_index = rand(0,sizeof($answers)-1);
        echo "<input type='radio' name='question_1' value=$answers[$A_index]>$answers[$A_index]</br>";
        unset($answers[$A_index]);
        $answers = array_values($answers);
    }
}

function query(){
    global $conn;

    $chapter = $_SESSION['chapters'][0];

//Getting the number of questions in the table
    $num_Questions = $conn->query("SELECT COUNT(*) FROM ".$chapter);
    $num_Questions = $num_Questions->fetch_array(MYSQLI_NUM);


    do{

//Choosing a random index between 1 and the number of questions there are in the table. This number will be used to
//choose a random question from the table and it's associated answer set.
        $Q_ID = rand(1,$num_Questions[0]);

    }while(in_array($Q_ID, $_SESSION['usedQuestions']));

    array_push($_SESSION['usedQuestions'], $Q_ID);
//Creating query strings to be used inside the query. if we need to do the same query again, it is better to put
//it in a variable

//Query for pulling the question from the databse
    $question_Query = "SELECT Question FROM ".$chapter." WHERE Q_ID=$Q_ID";

//Query for the answer set of the chosen question
    $answer_Query = "SELECT Answer,W_Answer_1,W_Answer_2,W_Answer_3 FROM ".$chapter." WHERE Q_ID=$Q_ID";


//Applying the query for the question and storing the results in the question object. The data cannot be used yet.
    $question = $conn->query($question_Query);
//Turning the results into an array so we can work with it in php. The MYSQLI_NUM parameter will give us a numbered index.
//We can also get the column name as the indexes with MYSQLI_NUM parameter.
    $question = $question->fetch_array(MYSQLI_NUM);
    $_SESSION{'question'} = $question;

//Querying the database for the answer set of the chosen question and turning the results into a numbered array.
    $answers = $conn->query($answer_Query);
    $answers = $answers->fetch_array(MYSQLI_NUM);
    $_SESSION['answers'] = $answers;
}