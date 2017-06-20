<?php require 'Functions.php'?>
<!DOCTYPE html >
<html>
<head>
    <title> Assignment </title>
</head>
<body id="edit" onload="generate('question','answers')">
<div style="margin:auto; width:20%; border: 3px solid #73AD21; text-align: center;" ><?php question();?>
<form id="myForm" action="assignment.php" method="post">
    <div id="answers" style="text-align: left;">
        <?php answers();?>
    </div></br>
    <input type="button" onclick="getScore('myForm')"value="Grade Me!">
</form>
</div>
</body>

