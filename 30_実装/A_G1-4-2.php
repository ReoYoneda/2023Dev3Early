<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }

    require_once "A_DBManager.php";
    $get = new DBManager();
    $postID = $_GET["postID"];
    $post = $get->get_post($postID);
    $userID = $post["user_id"];
    $user = $get->get_user_info($userID);
?>

<input type="button" onclick="location.href='A_G1-4-1.php'" value="戻る">
<input type="button" onclick="location.href='A_G1-4-3.php?postID=<?php echo $postID ?>'" value="回答"><br>

<?php  
    echo
    '名前　　 : '.$user["user_name"].'<br>
    日時 　　: '.date('Y/m/d　H:i',strtotime($post["post_date"])).'<br>
    学科　　 : '.$user["user_course"].'<br>
    学年　　 : '.$user["user_grade"].'年<br>
    クラス　 : '.$user["user_classname"].'<br>
    授業科目 : '.$post["post_subject"].'<br>
    タイトル : '.$post["post_title"].'<br>
    質問内容 : '.$post["post_text"].'<br>';
    if($post["post_image_path"]!=null){
        echo '<img src="'.$post["post_image_path"].'" height="200px" widht="200px"><br>';
    }
    echo '<object data="'.$post["post_file_path"].'"></object><br>';


    $replies = $get->get_replies($postID);
    foreach($replies as $reply){
        $user = $get->get_user_info($reply["user_id"]);
        $reply = $get->get_reply($reply["reply_id"]);
        echo
        '<div>----------------------------------------------------------------------------<br>'.
        '名前　　 : '.$user["user_name"].'<br>
        日時　　 : '.date('Y/m/d　H:i',strtotime($reply["reply_date"])).'<br>
        回答文　 : '.$reply["reply_text"].'<br>';
        if($reply["reply_image_path"]!=null){
            echo '<img src="'.$reply["reply_image_path"].'" height="200px" widht="200px"><br>';
        }
        echo '<object data="'.$reply["reply_file_path"].'"></object><br>
        </div>';
    }

?>