<?php
class Assignment{

    private $studentID, $assignmentID, $assignmentName, $maxPoints, $currentQuestion, $correctAnswer, $remainingPoints, $topicIndex, $connection;
    private $wrongAnswer = array();
    private $topics = array(array());

    //    public $maxQuestions;
    //    public $quesPerChapter;
    //    public $chapProgress = array();
    //    public $chapList = array("test");
    //    public $index = 0;
    //    public $usedQuestions = array();
    //    public $connection;
    //    public $totalQuestions;
    //
    //    public function __construct($maxQuestions, $chapList, $quesPerChapter, $DBconnection){
    //        $this->maxQuestions = $maxQuestions;
    //        $this->chapList = $chapList;
    //        $this->quesPerChapter = $quesPerChapter;
    //        var_dump($this->chapList);
    //    }

    public function __construct($studentID, $assignmentID, $assignmentName, $maxPoints, $topics, $DBconnection){
        $this->studentID = $studentID;
        $this->assignmentID = $assignmentID;
        $this->assignmentName = $assignmentName;
        $this->maxPoints = $maxPoints;
        $this->topics = $topics;
        $this->connection = $DBconnection;
    }



    public function generateQuestion(){
        //choose topic to use / decide if resuming or not.
        $query = "select question_id, assignment_id, student_id from used_questions where assignment_id =".$this->assignmentID." AND student_id =".$this->studentID.";";

        $results = $this->connection->query($query);

        $usedQuestions = extractRows($results);

        if(sizeof($usedQuestion) != 0){

        }else{
            $this->topicIndex = 0;

            $remainingPoints = $topics[$topicIndex][1];

        }


        $query = "select question_id, points from question where topic=".topics[$this->topicIndex][0].";";

        $results = $this->connection->query($query);

        $results = extractRows($results,1);

        $pointsList = array_column($results, "points");

        $questionList = array_column($results, "question_id");

        do{

            $randQuestion = rand(0, sizeof($questionList));


        }while( in_array($questionList[$randQuestion], $usedQuestion) || $pointsList[$randQuestion] <= $remainingPoints );

        $this->currentQuestion = $questionList[$randQuestion]

            saveQuestion($this->currentQuestion);

        $query = "select q.question, a.answer_num, a.answer from question as q inner join answer as a on q.question_id =".$this->currentQuestion." and q.question_id = a.question_id and a.correct =1 limit 1 ;";
        $query .= "select answer_num, answer from answer where question_id = 1 and correct = 0 limit 3;";

        $QA_set = array(
            "Question" => "",
            "Answers" => array()
        );

        if ($conn->multi_query($query)) {
            do {
                /* store first result set */
                if ($results = $conn->store_result()) {
                    $results = extractRows($results, 1);
                    $QA_set[]

                }

            } while ($conn->next_result());
        }





        //select a random question


    }

    private function saveQuestion($questionID){
        $query = "insert into used_questions (question_id, assignment_id, student_id) values (".$questionID.", ".$assignmentID.", ".$studentID.")";

        $this->connection->query($query);

    }

    public function checkAnswer($chosenAnswer){

    }

    private function savePoints(){

    }

    private function extractRows($results, $num_or_assoc){
        $rows = array();
        if($num_or_assoc == 0){
            while($row = $results->fetch_array(MYSQLI_NUM) ){
                array_push($rows, $row);
            }

        }else{
            while($row = $results->fetch_array(MYSQLI_ASSOC) ){
                array_push($rows, $row);
            }
        }

        return $rows;

    }





    //    public function generateQuestion(){
    //
    //        require_once 'config/config.php';
    //
    //        $this->connection = $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    //
    //        if(sizeof($this->chapProgress) == $this->quesPerChapter){
    //            $this->chapProgress = array();
    //            $this->index++;				
    //        }		
    //
    //        $this->totalQuestions = $this->connection->query("SELECT COUNT(*) FROM ".$this->chapList[$this->index]);
    //        $this->totalQuestions = $this->totalQuestions->fetch_array(MYSQLI_NUM);
    //
    //        do{
    //            //Choosing a random index between 1 and the number of questions there are in the table. This number will be used to
    //            //choose a random question from the table and it's associated answer set.
    //            $Q_ID = rand(1,$this->totalQuestions[0]);
    //
    //        }while(in_array($Q_ID, $this->chapProgress));
    //
    //        array_push($this->chapProgress, $Q_ID);
    //
    //        array_push($this->usedQuestions, $Q_ID);
    //
    //
    //
    //        $question_Query = "SELECT Question FROM ".$this->chapList[$this->index]." WHERE Q_ID=$Q_ID";
    //
    //        $answer_Query = "SELECT Answer,W_Answer_1,W_Answer_2,W_Answer_3 FROM ".$this->chapList[$this->index]." WHERE Q_ID=$Q_ID";
    //
    //        $Hint_Query = "SELECT Hint FROM ".$this->chapList[$this->index]." WHERE Q_ID=$Q_ID";
    //
    //
    //
    //        $question = $this->connection->query($question_Query);
    //        $question = $question->fetch_array(MYSQLI_NUM);
    //        $_SESSION{'question'} = $question;
    //
    //        $answers = $this->connection->query($answer_Query);
    //        $answers = $answers->fetch_array(MYSQLI_NUM);
    //        $_SESSION['answers'] = $answers;
    //
    //        $Hint = $this->connection->query($Hint_Query);
    //        $Hint = $Hint->fetch_array(MYSQLI_NUM);
    //        $_SESSION{'Hint'} = $Hint;
    //    }
    //
    //    public function getMaxQuestions(){
    //        return $this->maxQuestions;
    //    }
    //
    //    public function getUsedQuestions(){
    //        return $this->usedQuestions;
    //    }
    //
    //    public function getChapList(){
    //        return $this->chapList;
    //    }
    //
    //    public function getCurrentChap(){
    //        return $this->chapList[$index];
    //    }
    //
    //    public function getQuesPerChapter(){
    //        return $this->quesPerChapter;
    //    }

}