<?php
session_start();
$loggedin = $_SESSION['loggedin'];
              if(!$loggedin){
                  header('location: Login.php?msg=Restricted area. Please log in.');
                  if(isset($_SESSION['message'])){
                      echo $_SESSION['message'];
                  }
                  exit;
              }

?>

