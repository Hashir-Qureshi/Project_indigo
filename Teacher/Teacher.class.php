<?php

class Teacher{
    
    private $ID, $firstName, $lastName;
    
    public function __construct($first_name, $last_name,$id){
        $this-> ID        = $id;
        $this-> firstName = $first_name;
        $this-> lastName  = $last_name;
        
    }
    function loadTopics(){

    }
    function postTopics(){

    }
    function addQuestions(){

    }
    function loadQuestions(){
      
    }
    
}

?>