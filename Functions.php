<?php require_once "connections.php";


function question(){
     echo "<h2 id='question_1'>". $_SESSION['question'][0]."</h2>";
}

function answers(){
    $answers = $_SESSION['answers'];
    for($i =0;$i<4;$i++){
        $A_index = rand(0,sizeof($answers)-1);
        echo "<input type='radio' name='question_1' value=$answers[$A_index]>$answers[$A_index]</br>";
        unset($answers[$A_index]);
        $answers = array_values($answers);
    }
}