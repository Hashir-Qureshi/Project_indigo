    $(document).ready(function(){
        var prevLabel;
        var flag = $('#flag');

        $('#myForm').on('submit', function(event){
            event.preventDefault();

            var input = $('input[name=answer]:checked');
            var answer = {

                'answer': input.val()

            };
            var label = $('#'+input.val());

            $.ajax({
                type: 'POST',
                url: '/Project_indigo/Project_indigo/Validation.php',
                data: answer,
                datatype: 'json',
                encode: true
            }).done(function(data){
                var response    = JSON.parse(data);
                console.log(response);
                if(response.correct){
                    flag.text("Correct!");
                    flag.css('backgroundColor', '#90EE90');
                    label.css('backgroundColor', '#90EE90');

                }else{
                    flag.text("Wrong! Try 1 more time for .75 points");
                    flag.css('backgroundColor', '#F08080');
                    label.css('backgroundColor', '#F08080');
                }

                if(prevLabel !== undefined) prevLabel.css('backgroundColor', '');

                prevLabel = label;
                if(flag.css('display') !== 'none'){
                    flag.css('display', 'none');
                    flag.css('display', 'block');
                }else{
                    flag.css('display', 'block');
                }

            });
        });
    });
