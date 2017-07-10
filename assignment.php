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
    <script src="JavaScript/work.js"></script>
</head>
<body id="edit">
<div id="flag" style="display:none; width:100%; font-weight: bold;"></div>
<div id="container" style="margin:auto; width:20%; border: 3px solid indigo; text-align: center;">
    <h2 id="question">
        <?php echo $_SESSION['question'][0]; ?>
    </h2>
    <form id="myForm">
        <div id="answers" style="text-align: left;">

            <?php  $answers = $_SESSION['answers']; shuffle($answers);
            foreach ($answers as $answer):?>

                <label id="<?php echo $answer; ?>" style="display:block" >
                    <input id="answer" type="radio" name="answer" value="<?php echo $answer; ?>"> <?php echo $answer; ?>
                </label> <br>

            <?php endforeach; ?>

        </div>
            <input id="submit"  type="submit" name="check" value="Grade Me!" >
        <input id="nextQuestion" type="button" name="next" style="display: none" name="change" value="Next Question" >


    </form>

</div>
</body>
</html>