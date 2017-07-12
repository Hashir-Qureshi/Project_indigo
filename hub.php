<?php session_start();

    $_SESSION['usedQuestions'] = array();

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
                <input type="submit" name="choice" value="1">
                <input type="submit" name="choice" value="2">
            </form>
        </body>
    </html>