<?php session_start(); ?>
<!Doctype html>
<html>
<head>
</head>
<body>
<?php echo "Logged in as: ".$_SESSION['user'];?>
<form action="assignment.php" method="post">
    <input type="submit" name="choice" value="1">
    <input type="submit" name="choice" value="2">
</form>
</body>
</html>