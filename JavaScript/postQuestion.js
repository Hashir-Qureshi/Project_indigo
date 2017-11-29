$(document).ready(function(){


	$('#newQuestionForm').on('submit', function(e){

		e.preventDefault();

		var wrongAnswers = [];

		for (var i = 0; i < $('#answer-dropdown').val(); i++) {
			
			wrongAnswers.push($('#wrongAnswer-'+(i+1)+'-text').val());
		}

		var data = {
				"chapter": 	$('#chapter-input').val() ,
				"points": 	$('#points-input').val(),
				"part": 	$('#part-input').val() ,
				"question": $('#question-text').val(),
				"answer": 	$('#correctAnswer-text').val(),
				"hint": 	$('#hint-text').val(),
			"wrongAnswers": wrongAnswers
		};


		console.log(data);



			$.ajax({
				type:'POST',
				url: 'AdminScripts/postQuestion.php',
				data: JSON.stringify(data),
				dataType: 'json',
				encode: true
				}).done(function(response){

					console.log(response);

				});



	});






});