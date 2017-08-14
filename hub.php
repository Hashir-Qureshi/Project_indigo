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

    $assignments = array(
            "1" => "Not Available",
            "2" => "Not Available",
            "3" => "Not Available"
        );

    $query = "SELECT assignments.ID, students.HW_1_Grade, students.HW_2_Grade, students.HW_3_Grade from assignments, students WHERE (students.Empl_ID =".$_SESSION['pass'].") AND (assignments.Start_Date < NOW() AND assignments.End_Date > NOW())";

    
    $result = $conn->query($query);


    while ($row = mysqli_fetch_assoc($result)){

        $HW_Number = $row["ID"];

        $assignments[$HW_Number] = ($row["HW_".$HW_Number."_Grade"] != NULL) ? "Not Available" : "Available";
    }





    $_SESSION['try']=0;

    $_SESSION['status'] = "";

    $_SESSION['score'] = 0;



    $assignmentChapters = array(
                "assignment_1" => array('ch_1', 'ch_2', 'ch_3'),
                "assignment_2" => array('ch_6', 'ch_7', 'ch_8', 'ch_9'),
                "assignment_3" => array('ch_10', 'ch_11', 'ch_12', 'ch_13', 'ch_14')
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
                    $assignment = new Assignment(10, $assignmentChapters["assignment_3"], 2, $conn);
                    break;

            }

            $_SESSION['assignment'] = $assignment;

            header('location: assignment.php');
        }




?>
<!Doctype html>
<html>
    <head>
    <script src="JavaScript/jquery-3.2.1.js"></script>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
      <title>Hub page</title>

      <link href="css/Header.css" rel="stylesheet">
       <!-- jQuery first, then Tether, then Bootstrap JS. -->
      <script src="Javascript/jquery-3.2.1.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
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
                 <h4 class="card-title">Assignment 1</h4>
                  <div class="card-text" style=" max-height: 130px; overflow:auto;">
                        <p >
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      </p>  
                  </div>
              </div>
              <div class="align-bottom" style="padding-bottom: 5px; padding-left: 5px; padding-right: 5px; text-align: center;">
                    <form id="myForm" action="hub.php" method="post">
                       <button type="submit" class="btn btn-primary float-left"  name="choice" value="1" <?php echo  ($assignments['1'] != "Available") ? "disabled" : ""; ?> >
                          <span class="glyphicon glyphicon-play" aria-hidden="true"></span> Start</button>
                        <button type="button" class="btn btn-default float-right">Default</button>
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
                 <h4 class="card-title">Assignment 2</h4>
                  <div class="card-text" style=" max-height: 130px; overflow:auto;">
                        <p >
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      </p>  
                  </div>
              </div>
              <div class="align-bottom" style="padding-bottom: 5px; padding-left: 5px; padding-right: 5px; text-align: center;">
                    <form id="myForm" action="hub.php" method="post">
                       <button type="submit" class="btn btn-primary float-left"  name="choice" value="2" <?php echo  ($assignments['2'] != "Available") ? "disabled" : ""; ?> >
                          <span class="glyphicon glyphicon-play" aria-hidden="true"></span> Start</button>
                        <button type="button" class="btn btn-default float-right">Default</button>
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
                 <h4 class="card-title">Assignment 3</h4>
                  <div class="card-text" style=" max-height: 130px; overflow:auto;">
                        <p >
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      </p>  
                  </div>
              </div>
              <div class="align-bottom" style="padding-bottom: 5px; padding-left: 5px; padding-right: 5px; text-align: center;">
                    <form id="myForm" action="hub.php" method="post">
                       <button type="submit" class="btn btn-primary float-left"  name="choice" value="3" <?php echo  ($assignments['3'] != "Available") ? "disabled" : ""; ?> >
                          <span class="glyphicon glyphicon-play" aria-hidden="true"></span> Start</button>
                        <button type="button" class="btn btn-default float-right">Default</button>
                    </form>
              </div>
            </div>
          </div>
          </div>
        </div>
    </body>
</html>