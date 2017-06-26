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
    <input type="button" value="Grade Me" onClick="getScore(this.form);"><br>
    <table style="margin: auto">
        <tr>
            <td align="right"> Score out of 1 = </td>
            <td align="left"> <input type= text size=4 name= "mark"><br> </td>
        </tr>
        <tr>
            <td align="right"> Score in percentage = </td>
            <td align="left" > <input type=text size=4 name="percentage"><br> </td>
    </table>
</form>
</div>
</body>

