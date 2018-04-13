<?php

$query = "select question_id, assignment_id, student_id from used_questions where assignment_id =".$this->assignmentID." AND student_id =".$this->studentID.";";

$results = $this->connection->query($query);

$usedQuestions = extractRows($results);
