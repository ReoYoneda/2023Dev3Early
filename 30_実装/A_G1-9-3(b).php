<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }

    require_once "A_DBManager.php";
    $update = new DBManager();
    $update->user_update($_SESSION["userID"],$_POST["loginID"],$_POST["nickname"],$_POST["course"],
                    $_POST["major"],$_POST["grade"],$_POST["classname"],$_POST["Fsubject"]);

    header('Location:A_G1-9-1.php');
?>