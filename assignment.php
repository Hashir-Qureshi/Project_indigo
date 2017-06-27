<?php session_start();

$_SESSION['usedQuestions'] = array();

$_SESSION['MaxQuestions'] = 5;

$_SESSION['try']=0;

$_SESSION['status'] = "";


$chapters = array('ch_1','ch_2','ch_3');
if(!empty($_POST['choice'])) {
    $_SESSION['choice'] = $_POST['choice'];
    if($_SESSION['choice'] == 1) {
        $_SESSION['chapters'] = $chapters;
        require 'Assignment_1.php';
    }
}







