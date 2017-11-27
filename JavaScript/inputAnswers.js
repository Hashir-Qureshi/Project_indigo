$(document).ready(function(){


$("#addQuestionModal").on('click', generateFields);


var list = $("#answer-dropdown");

list.on('change', generateFields);

console.log(list.val());


function generateFields(){

	// $("#answerFields").html("It Works");

var fields = "";
var i;

	for(i=0; i < list.val() ;i++){

	fields +="<div id='wrongAnswer-"+(i+1)+"' class='row form-inline mt-2 ml-4'><label><span style='width: 50px;'>Wrong Answer:</span> <textarea  class='form-control offset-md-1' name='wrongAnswer-"+(i+1)+"' id='wrongAnswer-"+(i+1)+"' rows='3' cols='37'></textarea></label></div>"+
	         "<br>" 
	}

	$("#answerFields").html(fields);
}


});