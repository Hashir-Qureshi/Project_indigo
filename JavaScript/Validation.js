

//Running the script only when the document has loaded.
    $(document).ready(function(){
    //Getting the element which will be used to display any useful info like errors
        var flag = $('#flag');
    //Declaring the variables for keeping track of the attempts and progress
        var attempt;
        var progress;
        var finishBtn = $('input[name=finish]');


    // Getting the attempt and progress variables from local storage.
    // This is a fail-safe to ensure that the user can't refresh the page and have unlimited tries.
        if(localStorage.getItem('attempt') !== null){
        // The user had already attempted the question.
        // Grab the the attempt variable from local storage and convert it into an int.
             attempt =  parseInt(localStorage.getItem('attempt'));
        }else{
        // The user did not attempt the question yet.
             attempt = 0;
        }

    // Same thing as the attempt variable, but will be used to determine their progress.
        if(localStorage.getItem('progress') !== null){
            progress = parseInt(localStorage.getItem('progress'));
        }else{
            progress = 1;
        }
    // This variable will be used to keep a copy of the previous label so we can remove all css from it.

        var progDisplay = $('div#progress');

        progDisplay.text("Progress = "+progress+"/12");

        var choice;

        if(localStorage.getItem('choice') !== null){
            var value = localStorage.getItem('choice');
           choice = $("input[value='"+value+"']");
        }

        
    // Grabbing the buttons to change the question, submit the answer, and finish the assignment.
        var changeBtn = $('input[name=change]');
        var submitBtn = $('input[name=check]');
        var inputs = $('input[name=answer]');
        var question = $('h2#question');

        if(attempt === 2){
            submitBtn.hide();
            changeBtn.show();
            flag.text("Wrong! Click on \"Next Question\" to go to the next question.");
            flag.css('backgroundColor', '#F08080');
            flag.show();
            choice.prop('checked', true);
            choice.parent().addClass('wrong');
        }else if(attempt === 1){
            flag.text("Wrong! Try 1 more time for .75 points");
            flag.css('backgroundColor', '#F08080');
            flag.show();
            choice.prop('checked', true);
            choice.parent().addClass('wrong');
        }


    // Grabbing the main form and adding an event listener to it.
        $('#myForm').on('submit', function(event){

        // Preventing the form from submitting and reloading the page.
            event.preventDefault();
        // Grabbing the user's chosen radio button.
            choice = $('input[name=answer]:checked');
            localStorage.setItem('choice', choice.val());
        // Setting up the json object that will be sent to be validated.
            var answer = {
            // Contains the value of the user's choice.
                'answer': choice.val()

            };

        // Requesting Validation from the server in the background, without reloading the page.
            $.ajax({
                type: 'POST',           // The HTTP request method we will use.
                url: 'Validation.php',  // The URL of the script we are running.
                data: answer,           // The data we are sending.
                datatype: 'json',       // The type of data we are sending.
                encode: true            // Encodes the data
            }).done(function(data){
            //running a function once the call is finished.

            //Decoding the data we get back as a JSON object.
                var response    = JSON.parse(data);


                if(response.correct){
                // The correct key in our object was set to true, which means the answer was correct.

                // Set the background of the flag div to light green and show it.
                    flag.css('backgroundColor', '#90EE90');
                    flag.show();
                // Set the background color of the chosen answer to light green as well.
                    choice.parent().addClass('correct');
                // Hide the submit button.
                    submitBtn.hide();
                // The following if/else will check to see if the answered question was the last question.
                    if(progress === 12){
                    // The question was the last one. Display the finish button to let the user finish the assignment.
                        finishBtn.show();
                    // Change the text of the flag to reflect the status of the assignment.
                        flag.text("Correct! Click \"View Grade\" to see how you did.");
                    }else{
                    // The question was not the last question. display the button that will change the question.
                        changeBtn.show();
                        flag.text("Correct! Click \"Next Question\" to go to the next question.");
                    }
                // Checks to see if the user had gotten the question wrong before getting it right
                // if they had, then we need to change the background of the last incorrect label.
                    if(attempt === 1){
                        $('.wrong').removeClass('wrong');
                    }





                }else{
                // The user answered incorrectly.

                    if(attempt === 1){
                    // This was their second attempt.

                        submitBtn.hide();

                        if(progress === 12){
                        // The user answered the last question of the assignment.
                            flag.text("Wrong! Click \"View Grade\" to see how you did.");
                            finishBtn.show();
                        }else{
                        // There are still more questions to be answered.
                            flag.text("Wrong! Click on \"Next Question\" to go to the next question.");
                            changeBtn.show();
                        }
                    // Change the background color of the flag to light red to signify that the answer was incorrect.
                        flag.css('backgroundColor', '#F08080');
                        flag.show();
                        $('.wrong').removeClass('wrong');
                        choice.parent().addClass('wrong');


                    }else{
                    // This was their first attempt.
                        flag.text("Wrong! Try 1 more time for .75 points");
                        flag.css('backgroundColor', '#F08080');
                        flag.show();
                        choice.parent().addClass('wrong');
                    // Set attempt to 1 and store it in the local storage to be safe.
                    }

                }


                attempt++;
                localStorage.setItem('attempt', attempt);

            });




        });

        // Attaching the event listener to the Next Question button
        // We first need to unbind any click event listeners. The button is attached
        // this listener every time the form is submitted so we need to unbind the previous ones.
            changeBtn.unbind('click').on('click', function() {

                var request = {
                    'change' : true
                };

                $.ajax({
                    type: 'POST',
                    url: 'Validation.php',
                    data: request,
                    datatype: 'json',
                    encode: true
                }).done(function(data){
                    var newQuestion = JSON.parse(data);

                    console.log(newQuestion);
                    localStorage.setItem('progress', newQuestion.progress);
                    progress = newQuestion.progress;

                    question.text(newQuestion.question);
                    progDisplay.text("Progress = "+progress+"/12");
                    inputs.each(function (i) {
                        $(this).next().text(newQuestion.answers[i]);
                        $(this).val(newQuestion.answers[i]);
                        $(this).parent().attr('id', newQuestion.answers[i])
                        
                    });



                });

                flag.hide();
                choice.parent().removeClass('correct');
                $('.wrong').removeClass('wrong');
                choice.prop('checked', false);
                changeBtn.hide();
                submitBtn.show();
                attempt = 0;
                localStorage.setItem('attempt', attempt);


            });


            finishBtn.on('click', function(){
                localStorage.clear();
                window.location = "Confirmation.php";
            });
    });

