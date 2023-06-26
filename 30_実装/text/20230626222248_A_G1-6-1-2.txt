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
<input type="button" onclick="location.href='A_G1-10.php'" value="ヘルプ">

<h3>回答一覧</h3>

<input type="button" onclick="history.back()" value="戻る">
<input type="button" onclick="location.href='A_G1-6-1-3.php?postID=<?php echo $_GET['postID'] ?>'" value="Close">

<?php  
    require_once "A_DBManager.php";
    $get = new DBManager();
    $postID = $_GET["postID"];
    $post = $get->get_post($_GET["postID"]);
    $user = $get->get_user_info($_SESSION["userID"]);
    echo
    '<div>
    名前　　 : '.$user["user_name"].'<br>
    日時 　　: '.date('Y/m/d　H:i',strtotime($post["post_date"])).'<br>
    Lv　　　 : '.$user["user_lv"].'<br>
    DP 　 　 : '.$user["user_dp"].'<br>
    被評　　 : '.$user["user_Ravg"].'<br>
    与評　　 : '.$user["user_Savg"].'<br>
    授業科目 : '.$post["post_subject"].'<br>
    タイトル : '.$post["post_title"].'<br>
    質問内容 : '.$post["post_text"].'<br>';
    if($post["post_image_path"]!=null){
        echo '<img src="'.$post["post_image_path"].'" height="200px" widht="200px"><br>';
    }
    if($post["post_file_path"]!=null){
        echo '<object data="'.$post["post_file_path"].'"></object><br>';
    }

    echo '</div>';


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
        if($reply["reply_file_path"]!=null){
            echo '<object data="'.$reply["reply_file_path"].'"></object><br>';
        }
        echo '</div>';
    }

?>