<?php require 'Login.confirmation.php';
      require 'config/DB.connection.php';
      require 'Assignment.class.php';

    if(isset($_POST['logout'])){
        if(isset($_SESSION['user'])){
            session_destroy();
            echo "You have been logged out";
            header ('location: Login.php');
        }
    }


    $query = "SELECT ID FROM assignments WHERE Start_Date < NOW() AND End_Date > NOW()";

    
    $result = $conn->query($query);

    $All_assignments = array();

    while ($row = mysqli_fetch_assoc($result)){

        $HW_Number = $row["ID"];

        array_push($All_assignments, $row["ID"]);

    }

    $query = "SELECT HW_1_Grade, HW_2_Grade, HW_3_Grade FROM students WHERE Empl_ID =".$_SESSION['pass']."";

    $result = $conn->query($query);

    $row = mysqli_fetch_assoc($result);

        $grades = array($row["HW_1_Grade"], $row["HW_2_Grade"], $row["HW_3_Grade"]);


    $_SESSION['try']=0;

    $_SESSION['status'] = "";

    $_SESSION['score'] = 0;



    $assignmentChapters = array(
                "assignment_1" => array('ch_1', 'ch_2', 'ch_3'),
                "assignment_2" => array('ch_6', 'ch_7', 'ch_8', 'ch_9'),
                "assignment_3" => array('ch_10', 'ch_11', 'ch_12', 'ch_13')
        );


        if(!empty($_POST['choice'])) {            
            $_SESSION['choice'] = $_POST['choice'];

            switch($_POST['choice']){
                case 1:
                    $assignment = new Assignment(12, $assignmentChapters["assignment_1"], 4, $conn);
                    break;
                case 2:
                    $assignment = new Assignment(12, $assignmentChapters["assignment_2"], 3, $conn);
                    break;
                case 3:
                    $assignment = new Assignment(12, $assignmentChapters["assignment_3"], 3, $conn);
                    break;

            }

            $_SESSION['assignment'] = $assignment;

            header('location: assignment.php');
        }




?>
<!Doctype html>
<html>
    <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <title>Hub page</title>

      <link href="css/Header.css" rel="stylesheet">
       <!-- jQuery first, then Tether, then Bootstrap JS. -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </head>
    </head>
    <body>
    <?php include "header.php";?>

        <div class="container-fluid" style="margin-top: 150px; margin-bottom: 50px;">
        <div id="assignment1" class="row" style="max-height: 260px;">
          <div class="col-md-12">
          <img src="images/image1.png" class=" img-responsive float-left" style="height: 100%;">
            <div class="card" style="min-height: 260px; max-height: 260px;">
              <div class="card-block">
                 <h4 class="card-title" style="font-family: 'Source Sans Pro', sans-serif; font-weight: bold;">Assignment 1</h4>
                  <div class="card-text" style=" max-height: 130px; overflow:auto;">
                        <p style="font-family: 'Droid Sans', sans-serif;">
                        This assignment consists of:<br>
                        <strong>Chapter 1</strong> - "Charting the Heavens: The Foundations of Astronomy"<br> 
                        <strong>Chapter 2</strong> - "The Copernican Revolution: The Birth of Modern Science"<br> 
                        <strong>Chapter 3</strong> - "Radiation: Information from the Cosmos"<br> 
                        <strong>Chapter 5</strong> - "Telescopes: The Tools of Astronomy"
                        </p>
                  </div>
              </div>
              <div class="align-bottom" style="padding-bottom: 5px; padding-left: 5px; padding-right: 5px; text-align: center;">
                    <form id="myForm" action="hub.php" method="post">
                       <button type="submit" class="btn btn-primary float-left"  name="choice" value="1" <?php echo  (in_array("1", $All_assignments) AND $grades[0] == NULL) ? "" : "disabled"; ?> >
                            <span class="glyphicon glyphicon-play" aria-hidden="true"></span> Start</button>
                            <span class="btn btn-outline-success disabled float-right" style="cursor:default;">
                                <?php

                                    if(in_array("1", $All_assignments)){
                                        if($grades[0] != NULL){
                                            echo $grades[0]."/12";
                                        }else{
                                            echo "Assignment incomplete";
                                        }
                                    }else{
                                        if($grades[0] != NULL){
                                            echo $grades[0]."/12";
                                        }else{
                                            echo  "Assignment Not Available";
                                        }
                                    }
                                ?>
                            </span>
                    </form>
              </div>
            </div>
          </div>
          </div>
                  <div id="assignment2" class="row" style="max-height: 260px; margin-top: 50px;">
          <div class="col-md-12">
          <img src="images/image1.png" class=" img-responsive float-left" style="height: 100%;">
            <div class="card" style="min-height: 260px; max-height: 260px;">
              <div class="card-block">
                 <h4 class="card-title" style="font-family: 'Source Sans Pro', sans-serif; font-weight: bold;">Assignment 2</h4>
                  <div class="card-text" style=" max-height: 130px; overflow:auto;">
                        <p style="font-family: 'Droid Sans', sans-serif;">
                        This assignment consists of:<br>
                        <strong>Chapter 6</strong> - "The Solar System: Comparative Planetology and Formation Models"<br>
                        <strong>Chapter 7</strong> - "Earth: Our Home in Space"<br>
                        <strong>Chapter 8</strong> - "The Moon and Mercury: Scorched and Battered Worlds"<br>
                        <strong>Chapter 9</strong> - "Venus: Earth’s Sister Planet"
                      </p>
                  </div>
              </div>
              <div class="align-bottom" style="padding-bottom: 5px; padding-left: 5px; padding-right: 5px; text-align: center;">
                    <form id="myForm" action="hub.php" method="post">
                       <button type="submit" class="btn btn-primary float-left"  name="choice" value="2" <?php echo  (in_array("2", $All_assignments) AND $grades[1] == NULL) ? "" : "disabled"; ?> >
                            <span class="glyphicon glyphicon-play" aria-hidden="true"></span> Start</button>
                            <span class="btn btn-outline-success disabled float-right" style="cursor:default;">
                                <?php

                                    if(in_array("2", $All_assignments)){
                                        if($grades[1] != NULL){
                                            echo $grades[1]."/12";
                                        }else{
                                            echo "Assignment incomplete";
                                        }
                                    }else{
                                        if($grades[1] != NULL){
                                            echo $grades[1]."/12";
                                        }else{
                                            echo  "Assignment Not Available";
                                        }
                                    }
                                ?>
                            </span>
                    </form>
              </div>
            </div>
          </div>
          </div>
        <div id="assignment3" class="row" style="max-height: 260px; margin-top: 50px;">
          <div class="col-md-12">
          <img src="images/image1.png" class=" img-responsive float-left" style="height: 100%;">
            <div class="card" style="min-height: 260px; max-height: 260px;">
              <div class="card-block">
                 <h4 class="card-title" style="font-family: 'Source Sans Pro', sans-serif; font-weight: bold;">Assignment 3</h4>
                  <div class="card-text" style=" max-height: 130px; overflow:auto;">
                        <p style="font-family: 'Droid Sans', sans-serif;">
                        This assignment consists of:<br>
                        <strong>Chapter 10</strong> - "Mars: A Near Miss for Life?"<br>
                        <strong>Chapter 11</strong> - "Jupiter: Giant of the Solar System"<br>
                        <strong>Chapter 12</strong> - "Saturn: Spectacular Rings and Mysterious Moons"<br>
                        <strong>Chapter 13</strong> - "Uranus and Neptune: The Outer Worlds of the Solar System"
                      </p>  
                  </div>
              </div>
              <div class="align-bottom" style="padding-bottom: 5px; padding-left: 5px; padding-right: 5px; text-align: center;">
                    <form id="myForm" action="hub.php" method="post">
                       <button type="submit" class="btn btn-primary float-left"  name="choice" value="3" <?php echo  (in_array("3", $All_assignments) AND $grades[2] == NULL) ? "" : "disabled"; ?> >
                            <span class="glyphicon glyphicon-play" aria-hidden="true"></span> Start</button>
                            <span class="btn btn-outline-success disabled float-right" style="cursor:default;">
                                <?php

                                    if(in_array("3", $All_assignments)){
                                        if($grades[2] != NULL){
                                            echo $grades[2]."/12";
                                        }else{
                                            echo "Assignment incomplete";
                                        }
                                    }else{
                                        if($grades[2] != NULL){
                                            echo $grades[2]."/12";
                                        }else{
                                            echo  "Assignment Not Available";
                                        }
                                    }
                                ?>
                            </span>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </body>
</html>