
var numQues = 5;
var numChoi = 4;
var Q_Array = ["How old is Joshua","How old is Hashir","How old is Harpreet","How old is Fedora","How old is Mr Cosby"];
var A_Array = ["21","22","20","19","79"];
function getScore(form) {
    var score = 0;
    var currElt;
    var currSelection;
    var currQuestion = document.getElementById("question").innerHTML;
    var correctAnswer;
    var form = document.getElementById(form);
    for (q=0; q < Q_Array.length; q++) {
        if (currQuestion === Q_Array[q]) {
            correctAnswer = q;
            break;
        }
    }
    for (i=0; i<numQues; i++) {
        currElt = i*numChoi;
        var answered=true;
        for (j=0; j<numChoi; j++) {
            currSelection = form.elements[currElt + j];
            if (currSelection.checked) {
                answered=true;
                var edit= document.getElementById("edit");
                if (currSelection.value === A_Array[correctAnswer]) {
                    score++;
                    edit.innerHTML = "Good Job";
                    break;

                }else edit.innerHTML = "Try Again";
            }

        }
        if (answered === false){alert("Do answer all the questions, Please") ;return false;}
    }

    var scoreper = Math.round(score/numQues*100);
    form.percentage.value = scoreper + "%";
    form.mark.value=score;

}

function generate(Ques,ans) {
    $.ajax({
        url: 'assignment.php',
        success: function(output) {
            var result = $.parseJSON(output);

            var question = result[0];
            var work_Array= result[1];

            var Quest = document.getElementById(Ques);
            Quest.innerHTML = question;

            var answ = document.getElementById(ans);

            for (var i = 0; i < 4; i++) {
                A_index = Math.floor(Math.random() * (work_Array.length));
                answ.innerHTML = answ.innerHTML + "<input type = 'radio' name=()+question+( value =" + work_Array[A_index] + ">"
                    + work_Array[A_index] + "<br>";
                work_Array.splice(A_index, 1);
            }

        }
    });


}

