<?php

class Student{
    private $id, $firstName, $lastName, $connection;

    public function __construct($id, $firstName, $lastName, $DBconnection){
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->connection = $DBconnection;
    }

    public function loadEnrolledCourses(){

        $query = "select c.course_id, c.course_name, c.section_num, c.semester, c.year, e.enrollment_date from course as c inner join enroll as e on  (e.course_id=c.course_id and e.student_id=".$this->id.") inner join teacher as t on t.teacher_id=c.teacher;";

        $result = $this->connection->query($query);

        $enrolledCourses = array();

        while($row = mysqli_fetch_assoc($result)){
            array_push($enrolledCourses, $row);
        }

        return $enrolledCourses;

    }

    public function enrollCourse($courseID){
        $query = "insert into enroll (course_id, student_id) values (".$courseID.", ".$this->id.");";

        $result = $this->connection->query($query);

        if($result){
            return true;
        }else return false;
    }

    public function loadAssignments($courseID){
        $query = "select a.assignment_name, a.total_points, u.start_date, u.end_date from assignment as a inner join used_assignments as u on (a.assignment_id = u.assignment_id AND u.course_id =".$courseID.");";

        $result = $this->connection->query($query);

        $assignments = array();

        while($row = mysqli_fetch_assoc($result)){
            array_push($assignments, $row);
        }

        return $assignments;


    }

    public function getGrade($assignmentID){

        $query = "select grade from assignments_taken where student_id = ".$this->id." AND assignment_id = ".$assignmentID.";";

        $result = $this->connection->query($query);
        $grade = $result->fetch_array(MYSQLI_NUM)[0];

        return $grade;



    }

}