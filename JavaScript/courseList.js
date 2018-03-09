$(document).ready(function(){

    /**
done(function(response){

$("#Course_list:list-child").append(response);


});
*/

    $.ajax({
        type:"POST",
        url: "listCourses.php",
        data: ,
        dataType: "HTML",
        encode: true
    }).done(function(response){

        console.log(response);




    }); 





});