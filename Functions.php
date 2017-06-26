<?php
//Requiring the connections.php file to create functions using its variables
require 'connections.php';

//Function to echo a heading with the question retrieved from connections.php
function outputQuestion(){
    //We have to declare that we are using the global variable that was declared in connections.php
    global $question;
    echo "<h2 id='question_1'> $question[0]</h2>";
}

//Function to echo the answer choices randomly
function outputAnswers(){
    //The answers array from connections.php contains the correct answer and the wrong answer choices for that question.
    global $answers;
    for($i =0;$i<4;$i++){
        //Choosing a random index between 0 and the length of the answers array
        //We subtract 1 from the size because the rand() function includes the max but we don't want that
        //as it will overextended the index. The size of the answers array will change because we take out elements from
        //it later in the loop.
        $A_index = rand(0,sizeof($answers)-1);

        //Echo an HTML input field of the type radio. The value will be chosen from the answer array at the random
        //index chosen by A_index.
        echo "<input type='radio' name='answer' value=$answers[$A_index]>$answers[$A_index]</br>";

        //We use the unset function to take out the answer from the array that we just displayed so that the
        //choices aren't repeated.
        unset($answers[$A_index]);

        //Use the array_valuea() function to re-index the answers array. the unset() function does not re-index and
        //thus will cause complications in the algorithm.
        $answers = array_values($answers);
    }
}