<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }

    require_once "A_DBManager.php";
    $get = new DBManager();
    $postID = $_GET["postID"];
    $post = $get->get_post($postID);
    $postUser = $get->get_user_info($post["user_id"]);

    $users = $get->get_evaluate_users($postID);
    $dp = $postUser["user_dp"];
    foreach($users as $user){
        $num = $_POST["radio".$user['user_id']];
        $userInfo = $get->get_user_info($user["user_id"]);
        echo $userInfo["evaluation_trp"];
        echo '<br>'.$dp*$num.'<br>';
        $get->evaluate($postUser["user_id"],$user["user_id"],$dp,$num);
        $userInfo = $get->get_user_info($user["user_id"]);
        echo $userInfo["evaluation_trp"];
        echo '<br>---------------<br>';
    }
    if(count($users) == 0){
        $dp = 0;
    }
    $get->post_close($postUser["user_id"],$postID,$dp);

    header('location:A_G1-6-1-1.php');
?>