<?php
    session_start();
    require_once "A_DBManager.php";
    $create = new DBManager();
    $create->create($_POST["loginID"],$_POST["password"],$_POST["nickname"],$_POST["course"],
                    $_POST["major"],$_POST["grade"],$_POST["classname"],$_POST["Fsubject"]);


    $search = $create->login($_POST["loginID"],$_POST["password"]);
    
    foreach($search as $row){
        $_SESSION['userID']=$row['user_id'];
        header('Location:A_G1-3.php');
    }
    if(count($search)==0){
        header('Location:A_G1-1.php');
    }
?>