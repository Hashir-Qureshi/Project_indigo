<?php
require 'config/DB.connection.php';
require 'Student.class.php';

$student = new Student(2, 'Hashir', 'Qureshi', $conn);

//var_dump($student->loadEnrolledCourses());
//
//var_dump($student->enrollCourse(2));

//var_dump($student->loadAssignments(1));

var_dump($student->getGrade(1));
