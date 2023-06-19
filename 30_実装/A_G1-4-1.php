<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }
?>

<input type="button" onclick="location.href='A_G1-4-1.php'" value="みんなの投稿">
<input type="button" onclick="location.href='A_G1-6-1-1.php'" value="じぶんの投稿">
<input type="button" onclick="location.href='A_G1-7.php'" value="ランキング">
<input type="button" onclick="location.href='A_G1-8.php'" value="開催イベント">
<input type="button" onclick="location.href='A_G1-9-1.php'" value="ステータス">
<input type="button" onclick="location.href='A_G1-10.php'" value="ヘルプ"><br>

<h3>みんなの投稿</h3>

<input type="button" onclick="location.href='A_G1-5.php'" value="+ 投稿">

<?php
    require_once "A_DBManager.php";
    $get = new DBManager();
    $posts = array_reverse($get->get_posts());
    $users = $get->get_users();
    foreach($posts as $post){
        if($post["post_flag"] == 0){
            continue;
        }
        $user = $get->get_user_info($post["user_id"]);
        $postID = $post["post_id"];
        echo
        '<div style="background-color: #eee; width: fit-content; margin: 10px" onclick="location.href='."'A_G1-4-2.php?postID=".$postID."'".'" method="POST">
        ----------------------------------------------------------------------------<br>'.
       '日時　　 : '.date('Y/m/d　H:i',strtotime($post["post_date"])).'<br>
        user　　 : '.$user["user_id"].'<br>
        学科　　 : '.$user["user_course"].'<br>
        学年　　 : '.$user["user_grade"].'年<br>
        クラス　 : '.$user["user_classname"].'<br>
        授業科目 : '.$post["post_subject"].'<br>
        タイトル : '.$post["post_title"].'<br>
        名前　　 : '.$user["user_name"].'<br>
        Lv　　　 : '.$user["user_lv"].'<br>
        DP 　 　 : '.$user["user_dp"].'<br>
        被評　　 : '.$user["user_Ravg"].'<br>
        与評　　 : '.$user["user_Savg"].'<br>
        ----------------------------------------------------------------------------</div>';
    }
?>