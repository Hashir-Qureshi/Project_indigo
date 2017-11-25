$(document).ready(function(){


var list = $("#answer-dropdown");

list.on('change', generateFields);

console.log(list.val());


function generateFields(){

	// $("#answerFields").html("It Works");

var fields = "";
var i;
	for(i=0; i < list.val() ;i++){

	fields +="<div id='aswerField-"+(i+1)+"' class='row form-inline mt-2'><label><span class='mr-2'>Answer "+(i+1)+": </span> <textarea class='form-control' name='answer-"+(i+1)+"' id='answer-"+(i+1)+"' rows='3' cols='37'></textarea></label></div>"+
	         "<br>" 
	}

	$("#answerFields").html(fields);
}


});