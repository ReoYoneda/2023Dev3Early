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

<h3>回答</h3>

<input type="button" onclick="history.back()" value="戻る">

<?php
    require_once "A_DBManager.php";
    $get = new DBManager();
    $postID = $_GET["postID"];
    $post = $get->get_post($postID);
    $userID = $post["user_id"];
    $user = $get->get_user_info($userID);
    
    echo
    '<div>
    名前　　 : '.$user["user_name"].'<br>
    日時 　　: '.date('Y/m/d　H:i',strtotime($post["post_date"])).'<br>
    学科　　 : '.$user["user_course"].'<br>
    学年　　 : '.$user["user_grade"].'年<br>
    クラス　 : '.$user["user_classname"].'<br>
    授業科目 : '.$post["post_subject"].'<br>
    タイトル : '.$post["post_title"].'<br>
    質問内容 : '.$post["post_text"].'<br>
    </div>';
    if($post["post_image_path"]!=null){
        echo '<img src="'.$post["post_image_path"].'" height="200px" widht="200px"><br>';
    }
    if($post["post_file_path"]!=null){
        echo '<object data="'.$post["post_file_path"].'"></object><br>';
    }

    echo '<br>';
?>

<form action="A_G1-4-3(b).php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="postID" value="<?php echo $_GET["postID"] ?>">
    回答文 : 
    <textarea name="text" required></textarea><br>
    画像ファイル : 
    <input type="file" name="reply_image" accept="image/*"><br>
    テキストファイル : 
    <input type="file" name="reply_file" accept="text/*, .java, .php, .sql"><br>

    <input type="submit" value="回答">
</form>