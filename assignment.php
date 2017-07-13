<?php require 'Functions.php';
    session_start();
    if(empty($_SESSION['usedQuestions'][0])) {
        query();
    }
    ?>

<!DOCTYPE html>
    <html>
    <head>
        <title> Assignment </title>
        <script src="JavaScript/jquery-3.2.1.js"></script>
        <script src="JavaScript/Validation.js"></script>
        <link rel="stylesheet" href="CSS/assignment.css">
    </head>
    <body id="edit">
    <div id="flag" style="display:none; width:100%; font-weight: bold;"></div>
    <div id="container" class="container">
        <div id="progress" class="first"></div>
        <div class="second" style="border: 3px solid indigo; text-align: center;">
            <h2 id="question">
                <?php echo $_SESSION['question'][0]; ?>
            </h2>
            <form id="myForm">
                <div id="answers" style="text-align: left;">

                    <?php  $answers = $_SESSION['answers']; shuffle($answers);
                    foreach ($answers as $answer):?>

                        <label id="<?php echo $answer; ?>" style="display:block" >
                            <input id="answer" type="radio" name="answer" value="<?php echo $answer; ?>">
                            <span> <?php echo $answer; ?></span>
                        </label> <br>

                    <?php endforeach; ?>

                </div>
                <input type="submit" name="check" value="Grade Me!"><br>
                <input type="button" style="display:none" name="change" value="Next Question">
                <input type="button" style="display:none" name="finish" value="View Grade">

            </form>
        </div>
        <div id="hint" class="third"></div>
    </div>
    </body>
    </html>