<?php require 'Functions.php';
require 'Login.confirmation.php';
if(empty($_SESSION['usedQuestions'][0])) {
    query();
}
?>

<!DOCTYPE html>
    <html>
    <head>
        <title> Assignment </title>
        <!-- Bootstrap -->
        <link href="CSS/bootstrap.min.css" rel="stylesheet">
        <!-- Fonts -->
        <link href="/fonts/Roboto" rel="stylesheet">
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="JavaScript/jquery-3.2.1.js"></script>
        <script src="JavaScript/bootstrap.min.js"></script>
        <script src="JavaScript/Validation.js"></script>
        <link rel="stylesheet" href="CSS/assignment.css">
    </head>
    <body id="edit">

    <div class="container ">
        <div class="row">
            <div class="wrap-stuff col-md-2" style="text-align: left;">This is the progress</div>
            <div id="assignment" class=" coloring col-md-8 wrap-assignment">
                <div id="question" class=" padding text-align: center;" style="font-size: 24px; font-family: 'Zilla Slab', Serif; font-weight: bold;" >
                    <?php echo $_SESSION['question'][0]; ?>

                 </div>

            <form id="myForm">
                <div id="answers" style="text-align: left; font-size">
                    <?php  $answers = $_SESSION['answers']; shuffle($answers);
                    foreach ($answers as $answer):?>

                        <label id="<?php echo $answer; ?>" class="button"  style="font-family: 'Zilla Slab' , Serif; margin-bottom: -3%;" >
                            <input id="answer" type="radio" name="answer" value="<?php echo $answer; ?>">
                            <span> <?php echo $answer; ?></span>
                        </label> <br>

                    <?php endforeach; ?>

                </div>
                <div id="flag" style="display:none; width:100%; font-weight: bold;"></div>

                <input type="submit" name="check" value="Grade Me!" class="btn-assignment btn btn-default btn-primary btn-block"><br>
                <input type="button" style="display:none" name="change" value="Next Question" class="btn-assignment btn btn-default btn-primary btn-block">
                <input type="button" style="display:none" name="finish" value="View Grade" class="btn-assignment btn btn-default btn-primary btn-block" >

            </form>

        </div>
            <div id="hint" class="wrap-stuff col-md-2" style="text-align: center;">This is the Hint</div>
        </div>
    </div>
    </body>
    </html>