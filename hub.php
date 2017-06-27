<?php

if(!isset($_SESSION)) session_start();

if(!isset($_SESSION['score'])) $_SESSION['score'] = 0;
?>
<!Doctype html>
<html>
<head>
</head>
<body>
<form action="assignment.php" method="post">
    <input type="submit" name="choice" value="1">
    <input type="submit" name="choice" value="2">
</form>
<?php echo "Your score is ".$_SESSION['score'];?>
</body>
</html>
<?php if(sizeof($_SESSION['usedQuestions']) == 5) $_SESSION['score'] = 0;?>