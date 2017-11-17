$(document).ready(function(){

$('#addCourse').on("click", displayCourseForm );

console.log("in JS");

function displayCourseForm(){
console.log("in function");


var content = "<form action='addCourse.php' id='courseAdd' method = 'post'>"+

  "<label for='courseName'>Course Name &nbsp;&nbsp;</label> <input type='text' id='courseName' name='courseName'><br /><br />"+
  
  "<label for='courseNum'>Course Number</label> <input type='number' id='courseNum' name='courseNum'><br /><br />"+
  
  "<button type = 'submit' name='submit'>Add</button>"+
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

$.ajax({
        type:"POST",
        url: "postCourses.php",
        data: courseInfo,
        dataType: "json",
        encode: true
        }).done(function(response){
     		
        

     		

        }); 

}



});

}




function courseOptions(){

	var options =  "<div class='courseOptions'>"+
  "	<button type = 'submit' name='editQ'>Edit Questions</button>"+
  	"<button type = 'submit' name='submit'>Create Assignment</button>"+
  	"<button type = 'submit' name='submit'>Check Status</button>"+
  	"<button type = 'submit' name='submit'>View/Edit Assignments</button>";


}


});