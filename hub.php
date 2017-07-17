<?php require 'Login.confirmation.php';
      require 'config/DB.connection.php';

    if(isset($_POST['logout'])){
        if(isset($_SESSION['user'])){
            session_destroy();
            echo "You have been logged out";
            header ('location: Login.php');
        }
    }

    $homeworks = array(
            "1" => "Not Available",
            "2" => "Not Available",
            "3" => "Not Available"
        );

    $query = "SELECT homeworks.HW_ID, students.HW_1_Grade, students.HW_2_Grade, students.HW_3_Grade from homeworks, students WHERE (students.Empl_ID = 1) AND (homeworks.Start_Date < NOW() AND homeworks.End_Date > NOW())";

    
    $result = $conn->query($query);


    while ($row = mysqli_fetch_assoc($result)){

        $HW_Number = $row["HW_ID"];

        $homeworks[$HW_Number] = ($row["HW_".$HW_Number."_Grade"] != NULL) ? "Not Available" : "Available";
    }



    $_SESSION['usedQuestions'] = array(array(), array(), array());


    $_SESSION['MaxQuestions'] = 12;

    $_SESSION['try']=0;

    $_SESSION['status'] = "";

    $_SESSION['score'] = 0;



    $assignment_1 = array('ch_1','ch_2','ch_3');
    $assignment_2 = array('ch_4','ch_5','ch_6');
    $assignment_3 = array('ch_7','ch_8','ch_9');

        if(!empty($_POST['choice'])) {
            $_SESSION['choice'] = $_POST['choice'];
            if($_SESSION['choice'] == 1) {
                $_SESSION['chapters'] = $assignment_1;
                header('location: Assignment.php');
            }elseif ($_SESSION['choice'] == 2) {
                $_SESSION['chapters'] = $assignment_2;
            }else
                $_SESSION['chapters'] = $assignment_3;

            header('location: Assignment.php');
        }




?>

    <!Doctype html>
    <html>
        <head>
        </head>
        <body>
            <?php echo "Logged in as: ".$_SESSION['user'];?>
            <form action="" method="post">
                <input type="submit" name="choice" value="1" <?php echo  ($homeworks['1'] != "Available") ? "disabled" : ""; ?> >
                <input type="submit" name="choice" value="2" <?php echo  ($homeworks['2'] != "Available") ? "disabled" : ""; ?> >
                <input type="submit" name="choice" value="3" <?php echo  ($homeworks['3'] != "Available") ? "disabled" : ""; ?> >
            </form>
            <form action="" method="POST">
                <input type="submit" name="logout" value="Logout">
            </form>
        </body>
    </html>