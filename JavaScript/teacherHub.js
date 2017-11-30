$(document).ready(function(){


displayCourses();


displayaddCourseButton();



//Query the database using ajax and display the courses that exist
function displayCourses(){
$.ajax({
        type:"POST",
        url: "listCourses.php",
        dataType: "HTML",
        encode: true
        }).done(function(response){
        
        $("#courseList").html(response);

        }); 

};




$('#addCourse').on("click", displayCourseForm );

console.log("in JS");

function displayCourseForm(){
console.log("in function");


var content = 
"<div class='card p-2'> <div class='card-block'> <form action='addCourse.php' id='courseAdd' method = 'post' >"+

  "<label for='courseName'><span class='mr-4'>Course Name: </span><input type='text' id='courseName' name='courseName' class='form-control'></label><br /><br />"+
  
  "<label for='courseNum'><span>Course Number:</span><input type='number' id='courseNum' name='courseNum' class='form-control'></label> <br /><br />"+
  
  "<div class='d-flex justify-content-center'><button type = 'submit' id='submit' class='btn btn-primary' name='submit' class='form-control'>Add</button></div>"+
  "</form></div></div>";
   

$('.replacer').html(content );

$('#courseAdd').on("submit", function(e){

			e.preventDefault();
	


var courseName = $( "#courseName" ).val();

var courseNum = $("#courseNum").val();


if(courseName =="" || courseNum ==""){

alert('Please fill all fields');

}else{

	var courseInfo = {
		"courseName":courseName,
		"courseNum":courseNum

	};
//Add the course in the database
$.ajax({
        type:"POST",
        url: "postCourses.php",
        data: courseInfo,
        dataType: "json",
        encode: true
        }).done(function(response){
          //refreshing thw course list after adding the new course 
            displayCourses();
            console.log("Displayed the courses");
            displayaddCourseButton();
        }); 



}



});

}




function displayaddCourseButton(){



 var content = "<div class='replacer' align='center'> "+

    "<button class='btn btn-primary' value='Add Course' id='addCourse'>Add Course</button><br/></div>";



  $('.replacer').html(content);

 $('#addCourse').on("click", displayCourseForm );


};


});