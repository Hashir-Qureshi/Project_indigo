<?php require 'Functions.php';
session_start();
if(empty($_SESSION['usedQuestions'])) {
    query();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Assignment </title>
    <script src="JavaScript/jquery-3.2.1.js"></script>
    <script src="JavaScript/Validation.js"></script>
</head>
<body id="edit">
<div> <?php echo "PROGRESS: ". sizeof($_SESSION['usedQuestions']). "/".$_SESSION['MaxQuestions']; ?></div>
<div style="margin:auto; width:20%; border: 3px solid indigo; text-align: center;">
    <h2 id="question">
        <?php echo $_SESSION['question'][0]; ?>
    </h2>
    <form id="myForm">
        <div id="answers" style="text-align: left;">

            <?php  $answers = $_SESSION['answers']; shuffle($answers);
            foreach ($answers as $answer):?>

                <label>
                    <input id="answer" type="radio" name="answer" value="<?php echo $answer; ?>"> <?php echo $answer; ?>
                </label> <br>

            <?php endforeach; ?>

        </div>
        <input type="submit" name="check" value="Grade Me!">
    </form>
</div>
</body>
</html>