<!DOCTYPE html >
<html>
<head>
    <title> Assignment </title>
    <script src="Assignment_Script.js"></script>
</head>
<body id="edit" onload="generate('question','answers')">
<h2 id="question"></h2>
<form id="myForm">
    <div id="answers"></div>
<input type="button" onclick="getScore('myForm')"value="Grade Me!">
</form>

</body>
</html>
