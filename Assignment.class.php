<?php
class Assignment{

    private $studentID, $id, $maxPoints, $currQuestion, $correctAnswer, $remPoints, $topicIndex, $maxAttempts, $attemptPenalty, $attempt, $connection;
    private $wrongAnswer = array();
    private $topics = array(array());



    private function __construct($studentID, $id, $maxPoints, $topics, $maxAttempts, $attemptPenalty, $conn){

        $this->studentID = $studentID;
        $this->assignmentID = $id;
        $this->maxPoints = $maxPoints;
        $this->topics = $topics;
        $this->connection = $conn;
        $this->attemptsAllowed = $attemptsAllowed;
        $this->attemptPenalty = $attemptPenalty;
        $this->topicIndex = 0;
        $this->attempt = 0;


        $remPoints = $topics[$topicIndex][1];
    }


    public static function resumeState($studentID, $id, $maxPoints, $topics, $attempt, $maxAttempts, $attemptPenalty, $currQuestion, $currentTopic, $remPoints, $conn){

        $instance = new self($studentID, $id, $maxPoints, $topics, $maxAttempts, $attemptPenalty, $conn);

        $instance->resumedFill($currQuestion, $currentTopic, $remPoints);

        return $instance;
    }

    public static function cleanState($studentID, $id, $maxPoints, $topics, $maxAttempts, $attemptPenalty, $conn){

        $instance = new self($studentID, $id, $maxPoints, $topics, $attemptsAllowed, $attemptPenalty, $conn);

        return $instance;
    }


    protected function resumedFill($currQuestion, $currentTopic, $remPoints){

    }


    public function generateQuestion(){


        $query = "select question_id from used_questions where assignment_id =".$this->id." AND student_id =".$this->studentID.";";

        $results = $this->connection->query($query);

        $usedQuestions = extractRows($results,0);


        $query = "select question_id, points from question where topic=".topics[$this->topicIndex][0].";";

        $results = $this->connection->query($query);

        $results = extractRows($results,1);


        $pointsList = array_column($results, "points");

        $questionList = array_column($results, "question_id");

        do{

            $randQuestion = rand(0, sizeof($questionList));


        }while( in2dArray($questionList[$randQuestion], $usedQuestion) || $pointsList[$randQuestion] > $remPoints );

        $this->currQuestion = $questionList[$randQuestion];

        saveQuestion();


        return getQA_set();


    }
    
    
    

    private function saveQuestion(){
        $query = "insert into used_questions (question_id, assignment_id, student_id) values (".$this->currQuestion.", ".$this->id.", ".$this->studentID.")";

        $this->connection->query($query);

    }

    public function checkAnswer($chosenAnswer){

        $attempt++;

        $msg = array("nextQuestion" => ''.
                     "correct" => '');

        if($chosenAnswer == $this->correctAnswer){

            savePoints(false);
            $msg["nextQuestion"] = true;
            $msg["correct"] = true;

        }else{

            if($attempt == $maxAttempts){

                savePoints(true);
                $msg["nextQuestion"] = true;
                $msg["correct"] = false;

            }else{

                $msg["nextQuestion"] = false;
                $msg["correct"] = false;
                saveAttempt();

            }

        }

        return $msg;

    }


    private function savePoints($applyPenalty){
        
        $query = "select points from question where question_id =".$this->currQuestion.";";
        
        $points = extractRows($this->connection->query($query), 0);
        
        $remPoints -= $points[0];
        
        if($applyPenalty){
        $points[0] = $points[0] - ($points[0] * $attemptPenalty);
        }


        $query = "update used_questions set points_earned =".$points[0].", set attempts=".$this->attempt.", where question_id =".$this->currQuestion." AND assignment_id =".$this->id." AND student_id =".$this->studentID.";";

        $this->connection->query($query);
    }

    private function saveAttempt(){
        $query = "update used_questions set attempts=".$this->attempt." where question_id =".$this->currQuestion." AND assignment_id =".$this->id." AND student_id =".$this->studentID.";";

        $this->connection->query($query);
    }

    public function getQA_set(){

        $query = "select q.question, a.answer_num, a.answer from question as q inner join answer as a on q.question_id =".$this->currQuestion." and q.question_id = a.question_id and a.correct =1 limit 1 ;";
        $query .= "select answer_num, answer from answer where question_id = 1 and correct = 0 limit 3;";

        $QA_set = array();

        if ($conn->multi_query($query)) {
            do {
                /* store first result set */
                if ($results = $conn->store_result()) {
                    $results = extractRows($results, 1);
                    foreach($results as $result){
                        array_push($QA_set, $result);
                    }

                }

            } while ($conn->next_result());
        }

        $this->correctAnswer = $QA_set[0]['answer_num'];

        return $QA_set;

    }

    public function isFinished(){

        if($this->topicIndex == sizeof($this->topics) and $this->remPoints == 0){
            return true;
        }else return false;
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

    private function in2dArray($value, $arrays){
        $result = false;

        foreach($arrays as $array){
            
            if(in_array($value, $array)){
                $result = true;
                break;
            }
        }
        return $result;
    }



}