<?php
    session_start();
    require_once "A_DBManager.php";
    $create = new DBManager();
    $create->create($_SESSION["loginID"],$_SESSION["password"],$_SESSION["nickname"],$_SESSION["course"],
                    $_SESSION["major"],$_SESSION["grade"],$_SESSION["classname"],$_SESSION["Fsubject"]);


    $search = $create->login($_SESSION["loginID"],$_SESSION["password"]);
    
    unset($_SESSION['userID']);
    unset($_SESSION['password']);
    unset($_SESSION['nickname']);
    unset($_SESSION['course']);
    unset($_SESSION['major']);
    unset($_SESSION['grade']);
    unset($_SESSION['classname']);
    unset($_SESSION['Fsubject']);

    foreach($search as $row){
        $_SESSION['userID']=$row['user_id'];
        header('Location:G1-3.php');
    }
    if(count($search)==0){
        header('Location:G1-1.php');
    }
?>