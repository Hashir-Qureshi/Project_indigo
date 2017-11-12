$(document).ready(function(){

	$( document ).ajaxStart(function() {
    $( "#loading" ).css("visibility", "visible");
});

	$( document ).ajaxStop(function() {
    $( "#loading" ).css("visibility", "hidden");
});



$('#chapter-input').on("input", changeChapter);

var filter = $('#chapter-input').val();

$.ajax({
	type: "POST",
	url: "loadQuestions.php",
	data: {filter: filter},
	dataType: 'HTML',
	encode: true

}).done(function(response){
	$('#questionsTable > tbody:last-child').append(response);

});



function changeChapter(){
	var chapter = $('#chapter-input').val();

	$.ajax({
	type: "POST",
	url: "loadQuestions.php",
	data: {filter: chapter},
	dataType: 'HTML',
	encode: true

}).done(function(response){
	$('#questionsTable > tbody:last-child').html(response);

});

}


});	