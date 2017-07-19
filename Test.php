<?php
	class Assignment{
		require "config/DB.connection.php";

		private $quesPerChapter;
		private $chapProgress = array();
		private $chapList;
		private $index = 0;


		public function __construc($maxQuestions, $chapList, $quesPerChapter){
			this->$maxQuestions = $maxQuestions;
			this->$chapProgress = $chapList;
			this->quesPerChapter = $quesPerChapter;
		}

		public function generateQuestion(){


				if(sizeof($chapProgress) == $quesPerChapter){
					$chapProgress = array();
					$index++;				
				}		

				$totalQuestions = $conn->query("SELECT COUNT(*) FROM ".$chapList[$index]);
		        $totalQuestions = $totalQuestions->fetch_array(MYSQLI_NUM);

		        do{
		    //Choosing a random index between 1 and the number of questions there are in the table. This number will be used to
		    //choose a random question from the table and it's associated answer set.
		            $Q_ID = rand(1,$totalQuestions[0]);
		            
		        }while(in_array($Q_ID, $chapProgress);

		        array_push($chapProgress, $Q_ID);

		        $question_Query = "SELECT Question FROM ".$chapList[$index]." WHERE Q_ID=$Q_ID";

		        $answer_Query = "SELECT Answer,W_Answer_1,W_Answer_2,W_Answer_3 FROM ".$chapList[$index])." WHERE Q_ID=$Q_ID";

				session_start();

		        $question = $conn->query($question_Query);
		        $question = $question->fetch_array(MYSQLI_NUM);
		        $_SESSION{'question'} = $question;

		        $answers = $conn->query($answer_Query);
       			$answers = $answers->fetch_array(MYSQLI_NUM);
       			$_SESSION['answers'] = $answers;



		}


	}