<?php
    session_start();
    require_once "A_DBManager.php";
    $login = new DBManager();
    $search = $login->login($_POST["loginID"],$_POST["password"]);
    foreach($search as $row){
        $_SESSION['userID']=$row['user_id'];
        header('Location:A_phptest03.php');
    }
    if(count($search)==0){
        header('Location:A_phptest00.php');
    }
?>