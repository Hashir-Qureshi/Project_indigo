$(document).ready(function(){
    //process the form

    var ques = $('input#nextQuestion');
    var sub =  $('input#submit');
    var quesDisplay = $('h2#question');
    var inputs = $('input');
    $('#myForm').submit(function(event){
        event.preventDefault();
        //get the form data
        //there are many ways to get this data using JQuery

        var input = $('input[name=answer]:checked');

        var formData = {
            'answer'      : input.val()
        };

        //process the form
        $.ajax({
            type: 'POST',
            url: 'Validation.php',
            data: formData,
            dataType: 'json',
            encode: true
        })
        //using the done promise callback
            .done(function(response){

                console.log(response);
                //log data to the console so we can see
                if(response.correct){
                    console.log('hi');
			console.log('hello');
                }




                ques.on('click', changeQuestion);



                function changeQuestion(){
                        ques.css('display', 'none');
                        quesDisplay.text(response.question);
                    for(i=0; i<4; i++ ){
                        inputs.each(function(i){
                            inputs[i].text(response.answers[i]);
                            inputs[i].value = response.answers[i];
                        })

                    }
                    sub.css('display','inline');

                }
                //var sub = document.getElementById("submit");




                //window.location.reload()
            });
    })
})
