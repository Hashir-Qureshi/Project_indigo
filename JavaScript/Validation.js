    $(document).ready(function(){

        $('#myForm').on('submit', function(event){
            event.preventDefault();

            var answer = {

                'answer': $('input[name=answer]:checked').val()

            };
            $.ajax({
                type: 'POST',
                url: '/Project_indigo/Project_indigo/Validation.php',
                data: answer,
                datatype: 'json',
                encode: true
            }).done(function(response){
                console.log(response);

                

            });
        });
    });
