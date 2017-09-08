<?php
spl_autoload_register(function($class){
    include $class.'.class.php';
});

require 'Login.confirmation.php';

$assignment = $_SESSION['assignment'];

if($assignment->getUsedQuestions() == null) {
    $assignment->generateQuestion();
}

$progress = (sizeof($assignment->getUsedQuestions())/$assignment->getMaxQuestions())*100;
?>

<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Assignment </title>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="JavaScript/jquery-3.2.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script src="JavaScript/Validation.js"></script>
        <link rel="stylesheet" href="CSS/assignment.css">
        <link href="css/Header.css" rel="stylesheet">

    </head>
    <body id="edit">

    <!-- First Navbar -->
    <nav class="navbar fixed-top first-navbar" style="text-align: center; margin-bottom:0;">
            <div class="navbar-text py-0">
              <div class="navbar-header">
                  <span href="" style="font-family:'Roboto', sans-serif; color:#fff;"><b>C.H.E.S.S.</b></span>
                  <div style="font-family:'Roboto Condensed', sans-serif; color:#fff;">Computerized Homework Exercise SyStem</div>
              </div>
            </div>
        </nav>
    <!-- Second Navbar -->
        <nav class="navbar fixed-top" style="background-color: #333; margin-top:53.5938px; text-align: center; margin-bottom:0;">
            <div class="navbar-text py-0">
                <div class="navbar-header">
                    <span class="float-left" href="" style="font-family:'Roboto Condensed', sans-serif; color:#fff;"><b><?php echo "Logged in as: ".$_SESSION['user'];?></b></span>
                </div>
            </div>
        </nav>

        <!-- Progress Bar -->
            <div id="progress" class="progress" style="margin-top: 95px;">
                <div class="progress-bar" style= <?php echo '"width: '.$progress.'%; height:25px; background-color:indigo;"'; ?> >
                        <h6 id="progDisplay" style="padding:2px;"><?php echo sizeof($assignment->getUsedQuestions()).'/'.$assignment->getMaxQuestions(); ?></h6>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div id="assignment" class=" wrap-assignment card coloring col-md-8 col-sm-12 col-xs-12 offset-md-2">
                        <h3 id="question" class="card-header" style=" text-align: center; font-size: 24px; font-family: 'Source Sans Pro', Serif; font-weight: bold;" >
                        <?php echo $_SESSION['question'][0]; ?>

                        </h3>
                    <div class="card-block">

                        <form id="myForm" style="margin-bottom: -25px">
                            <div class="custom-controls-stacked">
                                <?php  $answers = $_SESSION['answers']; shuffle($answers);
                                foreach ($answers as $answer):?>

                                    <label id="<?php echo $answer; ?>" class=" custom-control custom-radio"  style="font-family: 'Droid Sans', sans-serif; margin-bottom: -3%;" >
                                        <input class="custom-control-input" id="answer" type="radio" name="answer" value="<?php echo $answer; ?>">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description"> <?php echo $answer; ?></span>
                                    </label> <br>

                                <?php endforeach; ?>
                            </div>
                            <div style="margin-top: 10px">
                                <div id="flag" style="display:none; width:100%; font-weight: bold;"></div>
                                <input type="submit" name="check" value="Grade Me!" class="btn-assignment btn btn-default btn-primary btn-block"><br>
                                <input type="button" style="display:none" name="change" value="Next Question" class="btn-assignment btn btn-default btn-primary btn-block">
                                <input type="button" style="display:none" name="finish" value="View Grade" class="btn-assignment btn btn-default btn-primary btn-block" >
                            </div>
                        </form>
                    </div>
                    </div>
            </div>
         </div>
    </body>
    </html>