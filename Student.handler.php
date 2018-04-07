<?php
require 'config/DB.connection.php';
require 'Student.class.php'; 


$query = "select q.question, a.answer from question as q inner join answer as a on q.question_id = 1 and q.question_id = a.question_id and a.correct =1 ;";
$query .= "select answer from answer where question_id = 1 and correct = 0;";

if ($conn->multi_query($query)) {
    do {
        /* store first result set */
        if ($results = $conn->store_result()) {
            
            print_r(extractRows($results, 1));
        }
        /* print divider */
        if ($conn->more_results()) {
            printf("<br>");
        }
    } while ($conn->next_result());
}


function extractRows($results, $num_or_assoc){
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

$student = new Student(2, 'Hashir', 'Qureshi', $conn);


//Loading enrolled courses. Displays course info in a table.
if(isset($_POST['loadEnrolledCourses'])){
    $courses = $student->loadEnrolledCourses();
    echo "<table>";
    foreach($courses as $courseInfo){
        echo "<tr>";
        foreach($courseInfo as $info){

            echo "<td>".htmlentities($info)."</td>";
        }
        echo "</tr>";
    } 
}

//Enroll for a course. Gives error message if enrollment fails.
if(isset($_POST['enroll'])){
    $courseID = mysqli_real_escape_string($conn, $_POST['courseCode']);
    if($student->enrollCourse($courseID)){
        echo "Enrollment Succesful!";
    }else echo "Enrollment Failed! You may already be enrolled in this course or the course code is invalid. Please confirm the course code and try again.";
}


//Load all the assignments for a course. Displays the assignment information
if(isset($_POST['loadAssignments'])){
    $courseID = $_POST['courseCode'];

    $assignments = $student->loadAssignments($courseID);
    echo "<table>";
    foreach($assignments as $assignemntInfo){
        echo "<tr>";
        foreach($assignemntInfo as $info){

            echo "<td>".htmlentities($info)."</td>";
        }
        echo "</tr>";
    } 

}


//Get the grade for an assignment
if(isset($_POST['getGrade'])){
    $assignmentID = $_POST['assignmentID'];
    echo $student->getGrade($assignmentID);
}
