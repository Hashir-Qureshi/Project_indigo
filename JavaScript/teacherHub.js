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


var content = "<form action='addCourse.php' id='courseAdd' method = 'post'>"+

  "<label for='courseName'>Course Name &nbsp;&nbsp;</label> <input type='text' id='courseName' name='courseName'><br /><br />"+
  
  "<label for='courseNum'>Course Number</label> <input type='number' id='courseNum' name='courseNum'><br /><br />"+
  
  "<button type = 'submit' id='submit' name='submit'>Add</button>"+
  "</form>";
   

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

    "<input type='button' value='Add Course' id='addCourse'> <br/></div>";



  $('.replacer').html(content);

 $('#addCourse').on("click", displayCourseForm );


};


});