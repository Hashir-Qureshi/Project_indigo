<!DOCTYPE html >
<html>
<head>
    <script src = "Assignment_Script.js" > </script>

    <title>Quiz Questions And Answers</title>
</head>

<body id="edit" onload="generate('Question','answers')">
<center><h1>Homework Questions</h1><bodyter>
<p>
    <form name="quiz">
</p>
    <b>
        <h2 id="Question"></h2></b>
<div id="answers"></div>

<p>
        <input type="button"value="Grade Me"onClick="getScore(this.form);">
        <input type="reset" value="Clear"></p>

    Number of score out of 1 = <input type= text size=15 name= "mark">
    Score in percentage = <input type=text size=15 name="percentage"><br>

    </form>

<form method="post" name="Form" onsubmit="" action="">
</form>

</body>

</html>