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

<h3>投稿</h3>

<input type="button" onclick="history.back()" value="戻る">

<form action="A_G1-5(b).php" method="post" enctype="multipart/form-data">
    タイトル : 
    <input type="post_title" name="title" maxlength="30" required><br>
    授業科目 : 
    <input type="text" name="subject" required><br>
    質問内容 : 
    <textarea name="text" required></textarea><br>
    画像ファイル : 
    <input type="file" name="post_image" accept="image/*"><br>
    テキストファイル : 
    <input type="file" name="post_file" accept="text/*, .java, .php, .sql"><br>
 
    <input type="submit" value="登録">
</form>