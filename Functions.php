<?php
require 'connections.php';

function question(){
    global $question;
    echo "<h2 id='question_1'> $question[0]</h2>";
}

function answers(){
    global $results;
    for($i =0;$i<4;$i++){
        $A_index = rand(0,sizeof($results)-1);
        echo "<input type='radio' name='question_1' value=$results[$A_index]>$results[$A_index]</br>";
        unset($results[$A_index]);
        $results = array_values($results);
    }
}