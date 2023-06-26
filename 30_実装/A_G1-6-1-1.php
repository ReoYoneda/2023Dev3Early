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

<h3>じぶんの投稿</h3>

<input type="button" onclick="location.href='A_G1-6-1-1.php'" value=" Open " style="background-color: #dfdfdf;">
<input type="button" onclick="location.href='A_G1-6-2-1.php'" value="Closed" style="background-color: #fff;">

<?php
    require_once "A_DBManager.php";
    $get = new DBManager();
    $posts = array_reverse($get->get_my_posts($_SESSION["userID"]));
    
    foreach($posts as $post){
        if($post["post_flag"] == 0){
            continue;
        }
        $postID = $post["post_id"];
        echo
        '<div onclick="location.href='."'A_G1-6-1-2.php?postID=".$postID.'\'">
        ----------------------------------------------------------------------------<br>'.
       '日時　　 : '.date('Y/m/d　H:i',strtotime($post["post_date"])).'<br>
        授業科目 : '.$post["post_subject"].'<br>
        タイトル : '.$post["post_title"].'<br>
        id : '.$post["post_id"].'<br>
        ';
        if($post["post_image_path"]!=null){
            echo '<img src="'.$post["post_image_path"].'" height="200px" widht="200px"><br>';
        }
        if($post["post_file_path"]!=null){
            echo '<object data="'.$post["post_file_path"].'"></object><br>';
        }
    
        echo '</div>';
    }
?>