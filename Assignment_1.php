<?php require 'Functions.php';
if(isset($_SESSION['usedQuestions']) && ($_SESSION['try'] != 1)) query();
?>
<!DOCTYPE html>
<html>
<head>
    <title> Assignment </title>
</head>
<body id="edit">
<div> <?php echo "PROGRESS: ". sizeof($_SESSION['usedQuestions']). "/".$_SESSION['MaxQuestions']; ?></div>
<div style="margin:auto; width:20%; border: 3px solid indigo; text-align: center;">
    <?php question(); ?>
    <form id="myForm" action="Validation.php" method="post">
        <div id="answers" style="text-align: left;">
            <?php answers(); ?>
        </div></br>
        <input type="submit" name="check" value="Grade Me!">
        <input type="submit" name="change" value="Next Question">
    </form>
</div>
<span> <?php echo $_SESSION['status']; ?> </span>
</body>
</html>
