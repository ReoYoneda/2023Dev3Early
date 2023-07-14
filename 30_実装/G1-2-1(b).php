<?php
    session_start();
    if(isset($_SESSION['userID'])==true){
        header('Location:G1-4-1.php');
    }
    
    $_SESSION['loginID'] = $_POST['loginID'];
    $_SESSION['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $_SESSION['passwordLength'] = mb_strlen($_POST['password']);


    $pattern = '/^[a-zA-Z0-9_.+-]+$/';

    require_once "G1-DBManager.php";
    $passCheck = new DBManager();
    $users = $passCheck->get_users();
    $userLoginID = [];
    foreach($users as $user){
        array_push($userLoginID, $user['user_loginid']);
    }
    $exixtLoginID = in_array($_POST['loginID'], $userLoginID);

    if (preg_match($pattern, $_POST['loginID']) === 0) {
        $_SESSION['passCheck'] = 1;
        echo '<script> history.back(); </script>';
    }else if($exixtLoginID){
        $_SESSION['passCheck'] = 2;
        echo '<script> history.back(); </script>';
    }else if($_SESSION['passwordLength'] < 6){
        $_SESSION['passCheck'] = 3;
        echo '<script> history.back(); </script>';
    }else{
        unset($_SESSION['passCheck']);
        header('Location:G1-2-2.php');
    }
?>