<?php 
spl_autoload_register(function($class){
    include $class.'.class.php';
});

require 'Login.confirmation.php';

$assignment = $_SESSION['assignment'];

if($assignment->getUsedQuestions() == null) {
    $assignment->generateQuestion();
}
?>

<!DOCTYPE html>
    <html>
    <head>
        <title> Assignment </title>
        <script src="JavaScript/jquery-3.2.1.js"></script>
        <link rel="stylesheet" href="CSS/bootstrap.min.css">
        <script src="JavaScript/Validation.js"></script>
        <link rel="stylesheet" href="CSS/assignment.css">
    </head>
    <body id="edit">
    <div id="flag" style="display:none; width:100%; font-weight: bold;"></div>
    <div id="container" class="container">
        <div class="row wrapper">
        
                <div id="progress" class="col-md-2"><?php echo "Progress: ".sizeof($assignment->getUsedQuestions())."/".$assignment->getMaxQuestions(); ?></div>

                <div class="col-md-8" style="border: 3px solid indigo; text-align: center;">
                    <h3 id="question">
                        <?php echo $_SESSION['question'][0]; ?>
                    </h3>
                    <form id="myForm">
                        <div id="answers" style="text-align: left;">

                            <?php  $answers = $_SESSION['answers']; shuffle($answers);
                            foreach ($answers as $answer):?>

                                <label id="<?php echo $answer; ?>" class="" style="display:block" >
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

            <div id="hint" class="col-md-2">This is the hint</div>
        </div>
        
        </div>

    </div>
    </body>
    </html>