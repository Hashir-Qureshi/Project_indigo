<?php
require 'config/DB.connection.php';
require 'Student.class.php'; 



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
