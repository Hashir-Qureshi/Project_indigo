$(document).ready(function(){

    $( document ).ajaxStart(function() {
        $( "#loading" ).css("visibility", "visible");
    });

    $( document ).ajaxStop(function() {
        $( "#loading" ).css("visibility", "hidden");
    });



    $('#chapter-filter').on("input", filterQuestions);

    $('#points-filter').on("input", filterQuestions);

    $('#displayAll').change(function(){
        if (this.checked) {
            displayAll();
        }else{
            filterQuestions();
        }

    });


    var filter = {"chapter": $('#chapter-filter').val(),
                  "points": $('#points-filter').val()
                 };

    console.log(filter);
    $.ajax({
        type: "POST",
        url: "AdminScripts/loadQuestions.php",
        data: filter,
        dataType: 'HTML',
        encode: true

    }).done(function(response){
        $('#tableBody').html(response);

    });



    function filterQuestions(){
        var filter = {"chapter": $('#chapter-filter').val(),
                      "points": $('#points-filter').val()};

        $.ajax({
            type: "POST",
            url: "AdminScripts/loadQuestions.php",
            data: filter,
            dataType: 'HTML',
            encode: true

        }).done(function(response){
            $('#tableBody').html(response);

        });

    }

    function displayAll(){

        var displayAll = true;

        $.ajax({
            type: "POST",
            url: "AdminScripts/loadQuestions.php",
            data: {filter: displayAll},
            dataType: 'HTML',
            encode: true

        }).done(function(response){
            $('#tableBody').html(response);

        });
    }


});	