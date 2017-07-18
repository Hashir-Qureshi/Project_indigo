<?php require 'Login.confirmation.php';
      require 'config/DB.connection.php';

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

    $query = "SELECT assignments.ID, students.HW_1_Grade, students.HW_2_Grade, students.HW_3_Grade from assignments, students WHERE (students.Empl_ID = 1) AND (assignments.Start_Date < NOW() AND assignments.End_Date > NOW())";

    
    $result = $conn->query($query);


    while ($row = mysqli_fetch_assoc($result)){

        $HW_Number = $row["ID"];

        $assignments[$HW_Number] = ($row["HW_".$HW_Number."_Grade"] != NULL) ? "Not Available" : "Available";
    }





    $_SESSION['try']=0;

    $_SESSION['status'] = "";

    $_SESSION['score'] = 0;



    $assignmentChapters = array(
                "assignment_1" => array('ch_1', 'ch_2', 'ch_3', 'ch_5'),
                "assignment_2" => array('ch_6', 'ch_7', 'ch_8', 'ch_9'),
                "assignment_3" => array('ch_10', 'ch_11', 'ch_12', 'ch_13', 'ch_14')
        );


        if(!empty($_POST['choice'])) {
            $_SESSION['choice'] = $_POST['choice'];

            switch($_SESSION['choice']){
                case 1:
                    $_SESSION['usedQuestions'] = array(array(), array(), array(), array());
                    $_SESSION['chapters'] = $assignmentChapters["assignment_1"];
                    $_SESSION['MaxQuestions'] = 12;

                case 2:
                    $_SESSION['usedQuestions'] = array(array(), array(), array(), array());
                    $_SESSION['chapters'] = $assignmentChapters["assignment_2"];
                    $_SESSION['MaxQuestions'] = 12;
                    break;
                case 3:

                    $_SESSION['usedQuestions'] = array(array(), array(), array(), array(), array());
                    $_SESSION['chapters'] = $assignmentChapters["assignment_3"];
                    $_SESSION['MaxQuestions'] = 10;
                    break;

            }

            header('location: Assignment.php');
        }




?>

    <!Doctype html>
    <html>
        <head>
        <script>
            function setMaxQuestions(maxQuestions){
                    localStorage.setItem('maxQuestions', maxQuestions);
                    document.getElementById("myForm").submit();
            }
        </script>
        </head>
        <body>
            <?php echo "Logged in as: ".$_SESSION['user'];?>
            <form id="myForm" action="" method="post">
                <input type="submit" onclick="setMaxQuestions(12); return(false);" name="choice" value="1" <?php echo  ($assignments['1'] != "Available") ? "disabled" : ""; ?> >
                <input type="submit" onclick="setMaxQuestions(12); return(false);" name="choice" value="2" <?php echo  ($assignments['2'] != "Available") ? "disabled" : ""; ?> >
                <input type="submit" onclick="setMaxQuestions(10); return(false);" name="choice" value="3" <?php echo  ($assignments['3'] != "Available") ? "disabled" : ""; ?> >
            </form>
            <form action="" method="POST">
                <input type="submit" name="logout" value="Logout">
            </form>
        </body>
    </html>