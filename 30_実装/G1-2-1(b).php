<?php
    session_start();
    if(isset($_SESSION['userID'])==true){
        header('Location:G1-4-1.php');
    }

    $_SESSION['loginID'] = $_POST['loginID'];
    $_SESSION['password'] = $_POST['password'];

    header('Location:G1-2-2.php');
?>