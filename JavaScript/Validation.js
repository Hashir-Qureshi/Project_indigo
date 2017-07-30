

//Running the script only when the document has loaded.
    $(document).ready(function(){

        var flag = $('#flag'); //Getting the element which will be used to display any useful info like errors

    //Declaring the variables for keeping track of the attempts and progress
        var attempt;
        var progress;
        var maxQuestions = parseInt(localStorage.getItem('maxQuestions'));
        var finishBtn = $('input[name=finish]');
        var progDisplay = $('div#progress'); //Grabbing the div that will display the progress.



    // Getting the attempt and progress variables from local storage.
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
            maxQuestions = localStorage.getItem('maxQuestions');
            progDisplay.text("Progress = "+progress+"/"+maxQuestions);
        }else{
            progress = 1;
        }

        var choice;

        //Getting the choice that the user had chosen before they left the page.
        if(localStorage.getItem('choice') !== null){
            var value = localStorage.getItem('choice');
           choice = $("input[value='"+value+"']");
        }

        
    // Grabbing the buttons to change the question, submit the answer, finish the assignment, and all the answer radio buttons and the question div.
        var changeBtn = $('input[name=change]');
        var submitBtn = $('input[name=check]');
        var inputs = $('input[name=answer]');
        var question = $('div#question');


        //Restoring the state of the assignment if the page is refreshed or the user leaves and comes back in the middle of answering.
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

            event.preventDefault(); // Preventing the form from submitting and reloading the page.

            choice = $('input[name=answer]:checked');  // Grabbing the user's chosen radio button.

            localStorage.setItem('choice', choice.val()); // Saving the choice so we can restore the state on reload.

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
                console.log(data);

                var response    = JSON.parse(data); //Decoding the data we get back as a JSON object.
                
                //The Following if/else will determine if the user answered correctly or incorrectly.
                if(response.correct){
                // The correct key in our object was set to true, which means the answer was correct.

                // Set the background of the flag div to light green and show it.
                    flag.css('backgroundColor', '#90EE90');
                    flag.show();

                    choice.parent().addClass('correct'); // Set the background color of the chosen answer to light green as well.

                    submitBtn.hide(); // Hide the submit button.

                // The following if/else will check to see if the answered question was the last question in the assignment.
                    if(progress === maxQuestions){
                    // The question was the last one.
                        finishBtn.show(); //Display the finish button to let the user finish the assignment.
                        flag.text("Correct! Click \"View Grade\" to see how you did."); // Change the text of the flag to reflect the status of the assignment.
                    }else{
                    // The question was not the last question.
                        changeBtn.show(); //Display the button that will change the question.
                        flag.text("Correct! Click \"Next Question\" to go to the next question."); // Change the text of the flag to reflect the status of the assignment.
                    }

                // Checks to see if the user had already attempted the question once.
                    if(attempt === 1){
                        $('.wrong').removeClass('wrong'); // if they had, then we need to remove the background from the previous choice.
                    }





                }else{
                // The user answered incorrectly.

                    if(attempt === 1){
                    // The user had attempted the answer once.

                        submitBtn.hide(); //Hide the submit button so they can't answer again.

                        if(progress === maxQuestions){
                        // The user answered the last question of the assignment.
                            flag.text("Wrong! Click \"View Grade\" to see how you did."); // Change the text of the flag to reflect the status of the assignment.
                            finishBtn.show(); //show the finish button and let the user finish the assignment.
                        }else{
                        // There are still more questions to be answered.
                            flag.text("Wrong! Click on \"Next Question\" to go to the next question."); // Change the text of the flag to reflect the status of the assignment.
                            changeBtn.show(); // Show the next question button and let the user chnage the question.
                        }
                        flag.css('backgroundColor', '#F08080'); // Change the background color of the flag to light red to signify that the answer was incorrect.
                        flag.show(); //Show the flag
                        $('.wrong').removeClass('wrong'); // remove the wrong class from the previous wrong answer.
                        choice.parent().addClass('wrong'); // add the wrong class to the current wrong answer's label


                    }else{
                    // This was their first attempt.
                        flag.text("Wrong! Try 1 more time for .75 points"); // Change the text of the flag to reflect the status of the assignment.
                        flag.css('backgroundColor', '#F08080'); // Change the background color of the flag to light red to signify that the answer was incorrect.
                        flag.show(); //Show the flag
                        choice.parent().addClass('wrong'); // add the wrong class to the current wrong answer's label.
                    }

                }

                attempt++; // increment attempt because the user attempted to answer the question.
                localStorage.setItem('attempt', attempt); // save the attempt variable so we could restore the atate of the assignment.

            });




        });

        // Attaching the event listener to the Next Question button
            changeBtn.on('click', function() {

                //Setting up the request to the server to change the question.
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

                    console.log(data);

                    var newQuestion = JSON.parse(data); //Decoding the Server's response as a json object.


                    console.log(newQuestion);
                    localStorage.setItem('progress', newQuestion.progress); //Saving the new progress from the server to restore the state of the assignment.
                    localStorage.setItem('maxQuestions', newQuestion.maxQuestions);
                    progress = newQuestion.progress; //putting the new progress from the server in a variable so we can work with it.
                    maxQuestions = newQuestion.maxQuestions;

                    question.text(newQuestion.question); // changing the question to the new question from the server.
                    progDisplay.text("Progress = "+progress+"/"+ maxQuestions); // Changing the progress to reflect the current progress.
                    // looping through each radio button
                    inputs.each(function (i) {
                        // The answers array from the server has the correct answer and 3 wrong choices.
                        // The array is also already shuffled do we don't have to worry about randomizing.

                        $(this).next().text(newQuestion.answers[i]); // changing the text of the span tag for the radio button to the answer choice at index i in the answers array.
                        $(this).val(newQuestion.answers[i]); // changing the value of the radio button to the answer choice at index i in the answers array.
                        $(this).parent().attr('id', newQuestion.answers[i]) //Changing the id of the label for the radio buttonb to the answer choice at index i in the answers array.
                    });

                });

                flag.hide(); // hiding the flag because a new question will be displayed.
                choice.parent().removeClass('correct'); // removing the correct class from the label
                $('.wrong').removeClass('wrong'); // removing the wrong class from everything that has it.
                choice.prop('checked', false); // resseting the chosen radio button to unchecked state.
                changeBtn.hide(); //hiding the next question button.
                submitBtn.show(); // showing the submit button.
                attempt = 0; // resetting attempt.
                localStorage.setItem('attempt', attempt); // saving attempt so we can restore the state of the assignment.

            });

            // attaching the event handler to the button that finishes the assingment.
            finishBtn.on('click', function(){
                localStorage.clear(); // clear all variables from local storage.
                window.location = "Confirmation.php"; // take the user to the confirmation page.
            });
    });

