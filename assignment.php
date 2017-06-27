<?php session_start();
require 'Functions.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title> Assignment </title>
</head>
<body id="edit">
<?php

$chapters = array('ch_1','ch_2','ch_3');
if(!empty($_POST['choice'])){
    $choice = $_POST['choice'];
    if($choice == 1) {
        $_SESSION['chapters'] = $chapters;
 echo  '<div style="margin:auto; width:20%; border: 3px solid indigo; text-align: center;">';

    question();

    echo '<form id="myForm" action="Validation.php" method="post">';
 echo '<div id="answers" style="text-align: left;">';


    answers();

 echo <<<_END
    </div></br>
    <input type="submit" name="check" value="Grade Me!">
</form>
</div>
</body>
</html>
_END;
    }
}





?>


