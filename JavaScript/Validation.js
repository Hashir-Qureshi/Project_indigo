    $(document).ready(function(){
        var flag = $('#flag');
        var attempt;
        var progress;



        if(localStorage.getItem('attempt') !== null){
             attempt =  parseInt(localStorage.getItem('attempt'));
        }else{
             attempt = 0;
        }

        if(localStorage.getItem('progress') !== null){
            progress = parseInt(localStorage.getItem('progress'));
        }else{
            progress = 1;
        }

        var prevLabel;

        $('#myForm').on('submit', function(event){



            event.preventDefault();
            var choice = $('input[name=answer]:checked');
            var changeBtn = $('input[name=change]');
            var submitBtn = $('input[name=check]');
            var finishBtn = $('input[name=finish]');

            var answer = {

                'answer': choice.val()

            };
            var label = $('#'+choice.val());


            $.ajax({
                type: 'POST',
                url: 'Validation.php',
                data: answer,
                datatype: 'json',
                encode: true
            }).done(function(data){
                var response    = JSON.parse(data);



                if(response.correct){

                    flag.css('backgroundColor', '#90EE90');
                    flag.show();
                    label.css('backgroundColor', '#90EE90');

                    submitBtn.hide();

                    if(progress === 5){
                        finishBtn.show();
                        flag.text("Correct! Click \"View Grade\" to see how you did.");
                    }else{
                        changeBtn.show();
                        flag.text("Correct!");
                    }
                    progress === 5 ? finishBtn.show() : changeBtn.show();
                    if(attempt === 1 && prevLabel !== undefined){
                        prevLabel.css('backgroundColor', '')
                    }





                }else{

                    if(attempt === 1){


                        submitBtn.hide();

                        if(progress === 5){
                            flag.text("Wrong! Click \"View Grade\" to see how you did.");
                            finishBtn.show();
                        }else{
                            flag.text("Wrong! Click on \"Next Question\" to go to the next question.");
                            changeBtn.show();
                        }

                        flag.css('backgroundColor', '#F08080');
                        flag.show();
                        label.css('backgroundColor', '#F08080');



                        attempt = 0;
                    }else{

                        flag.text("Wrong! Try 1 more time for .75 points");
                        flag.css('backgroundColor', '#F08080');
                        flag.show();
                        label.css('backgroundColor', '#F08080');
                        attempt = 1;
                        localStorage.setItem('attempt', attempt);
                    }

                }

                prevLabel = label;

                if(flag.css('display') !== 'none'){
                    flag.css('display', 'none');
                    flag.css('display', 'block');
                }else{
                    flag.css('display', 'block');
                }



            });


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


                    localStorage.setItem('progress', newQuestion.progress);
                    progress = newQuestion.progress;

                    var inputs = $('input[name=answer]');
                    var question = $('h2#question');
                    question.text(newQuestion.question);
                    inputs.each(function (i) {
                        $(this).next().text(newQuestion.answers[i]);
                        $(this).val(newQuestion.answers[i]);
                        $(this).parent().attr('id', newQuestion.answers[i])
                    });



                });
                flag.hide();
                label.css('backgroundColor', '');
                choice.prop('checked', false);
                changeBtn.hide();
                submitBtn.show();

            });


            finishBtn.unbind('click').on('click', function(){
                localStorage.clear();
                window.location = "Confirmation.php";
            });

        });





    });

