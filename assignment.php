<?php require 'Functions.php';
session_start();
    if((empty($_SESSION['usedQuestions']) || $_SESSION['attemptedAnswer']) && $_SESSION['try'] != 1) {
        query();
        $_SESSION['attemptedAnswer'] = false;
    }
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
                </div>
                <input type="submit" name="check" value="Grade Me!">
            </form>
        </div>
        <span> <?php echo $_SESSION['status']; ?> </span>
        </body>
</html>
