$(document).ready(function(){

	$( document ).ajaxStart(function() {
    $( "#loading" ).css("visibility", "visible");
});

	$( document ).ajaxStop(function() {
    $( "#loading" ).css("visibility", "hidden");
});



$('#chapter-filter').on("input", changeChapter);

var filter = $('#chapter-filter').val();

$.ajax({
	type: "POST",
	url: "AdminScripts/loadQuestions.php",
	data: {filter: filter},
	dataType: 'HTML',
	encode: true

}).done(function(response){
	$('#tableBody').html(response);

});



function changeChapter(){
	var chapter = $('#chapter-filter').val();

	$.ajax({
	type: "POST",
	url: "AdminScripts/loadQuestions.php",
	data: {filter: chapter},
	dataType: 'HTML',
	encode: true

}).done(function(response){
	$('#tableBody').html(response);

});

}


});	