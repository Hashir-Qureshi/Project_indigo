<!DOCTYPE html >
<html>
<head>
    <title> Assignment </title>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "Qureshi1452";
    $dbname = "project indigo";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $Q_ID = rand(1,5);
    $query = "SELECT Question FROM CH_1 WHERE Q_ID=$Q_ID";
    $A_query = "SELECT Answer,W_Answer_1,W_Answer_2,W_Answer_3 FROM CH_1 WHERE Q_ID=$Q_ID";

    $question = $conn->query($query);
    $question = $question->fetch_array(MYSQLI_NUM);

    $results = $conn->query($A_query);
    $results = $results->fetch_array(MYSQLI_NUM);

    echo <<<_END
  <script type="text/javascript">
        function generate(Ques,ans) {
 
                    var  work_Array = ["$results[0]", "$results[1]", "$results[2]", "$results[3]"];
                    
                    var Quest = document.getElementById(Ques);
                    Quest.innerHTML = "$question[0]";

                    var answ = document.getElementById(ans);

                    for (var i = 0; i < 4; i++) {
                        var A_index = Math.floor(Math.random() * (work_Array.length));
                        answ.innerHTML = answ.innerHTML + "<input type = 'radio' name="+"$question[0]"+ "value =" + work_Array[A_index] + ">"
                            + work_Array[A_index] + "<br>";
                        work_Array.splice(A_index, 1);
                    }

                }
                
    </script>
_END;
    ?>
</head>
<body id="edit" onload="generate('question','answers')">
<h2 id="question"></h2>
<form id="myForm" action="assignment.php" method="post">
    <div id="answers"></div>
    <input type="button" onclick="getScore('myForm')"value="Grade Me!">
</form>
</body>

