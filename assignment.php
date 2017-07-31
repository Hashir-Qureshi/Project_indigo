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
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="JavaScript/jquery-3.2.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script src="JavaScript/Validation.js"></script>
        <link rel="stylesheet" href="CSS/assignment.css">

    </head>
    <body id="edit">
    <hr style="margin-top: 50px; margin-bottom: 0; height:1px;border:none;color:#333;background-color:#333;">

            <div id="progress" class="progress" style="margin-top: 0"  >
                <div class="progress-bar" style="width: 20%" >
                        20%
                </div>
            </div>

            <div class="container">
                <div class="row">
            <div id="assignment" class=" card coloring col-md-8 offset-md-2" data-toggle="popover" data-trigger="manual" data-html="true" data-title="Hint <button class='close' onclick='closePopover()'><span>&times;</span></button>" data-content="<?php echo $_SESSION['question'][0]; ?>" >
                <h3 id="question" class="card-header" style=" text-align: center; font-size: 24px; font-family: 'Zilla Slab', Serif; font-weight: bold;" >
                    <?php echo $_SESSION['question'][0]; ?>

                 </h3>
                <div class="card-block">

                    <form id="myForm" style="margin-bottom: -25px">
                        <div class="custom-controls-stacked">
                            <?php  $answers = $_SESSION['answers']; shuffle($answers);
                            foreach ($answers as $answer):?>

                                <label id="<?php echo $answer; ?>" class=" custom-control custom-radio"  style="font-family: 'Zilla Slab' , Serif; margin-bottom: -3%;" >
                                    <input class="custom-control-input" id="answer" type="radio" name="answer" value="<?php echo $answer; ?>">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description"> <?php echo $answer; ?></span>
                                </label> <br>

                            <?php endforeach; ?>
                            <div id="flag" style="display:none; width:100%; font-weight: bold;"></div>
                        </div>
                        <div style="margin-top: 10px">
                            <input type="submit" name="check" value="Grade Me!" class="btn-assignment btn btn-default btn-primary btn-block"><br>
                            <input type="button" style="display:none" name="change" value="Next Question" class="btn-assignment btn btn-default btn-primary btn-block">
                            <input type="button" style="display:none" name="finish" value="View Grade" class="btn-assignment btn btn-default btn-primary btn-block" >
                        </div>
                    </form>
                </div>
             </div>
            </div>
         </div>
            <div class="row">
                <div id="hint" class="wrap-hint col-md-3 offset-md-9" style="text-align: center; display: none">This is the Hint</div>
            </div>

    </body>
    </html>