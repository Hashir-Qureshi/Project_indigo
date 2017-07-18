 <?php

    function query(){

    require "config/DB.connection.php";

        
        switch($_SESSION['choice']){

            case 1:
            case 2: 

                $usedQuestions = (sizeof($_SESSION['usedQuestions'], 1) - 4);

                if($usedQuestions < 3){
                    $chapter = $_SESSION['chapters'][0];
                    $chapIndex = 0;
                }elseif($usedQuestions < 6){
                    $chapter = $_SESSION['chapters'][1];
                    $chapIndex = 1;
                }elseif( $usedQuestions < 9){
                    $chapter = $_SESSION['chapters'][2];
                    $chapIndex = 2;
                }else{
                    $chapter = $_SESSION['chapters'][3];
                    $chapIndex = 3;
                }
                break;
            case 3:

                $usedQuestions = (sizeof($_SESSION['usedQuestions'], 1) - 5);

                if($usedQuestions < 2){
                    $chapter = $_SESSION['chapters'][0];
                    $chapIndex = 0;
                }elseif($usedQuestions < 4){
                    $chapter = $_SESSION['chapters'][1];
                    $chapIndex = 1;
                }elseif( $usedQuestions < 6){
                    $chapter = $_SESSION['chapters'][2];
                    $chapIndex = 2;
                }else($usedQuestions < 8){
                    $chapter = $_SESSION['chapters'][3];
                    $chapIndex = 3;
                }else{
                    $chapter = $_SESSION['chapters'][4];
                    $chapIndex = 4;
                }
                break;
        }



    //Getting the number of questions in the table
        $num_Questions = $conn->query("SELECT COUNT(*) FROM ".$chapter);
        $num_Questions = $num_Questions->fetch_array(MYSQLI_NUM);


        do{

    //Choosing a random index between 1 and the number of questions there are in the table. This number will be used to
    //choose a random question from the table and it's associated answer set.
            $Q_ID = rand(1,$num_Questions[0]);
            
        }while(in_array($Q_ID, $_SESSION['usedQuestions'][$chapIndex]));

        array_push($_SESSION['usedQuestions'][$chapIndex], $Q_ID);
    //Creating query strings to be used inside the query. if we need to do the same query again, it is better to put
    //it in a variable

    //Query for pulling the question from the database
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