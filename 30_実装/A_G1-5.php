<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }
?>

<form action="A_G1-5(b).php" method="post" enctype="multipart/form-data">
    <h1>投稿</h1>
    タイトル : 
    <input type="post_title" name="title" maxlength="30" required><br>
    授業科目 : 
    <input type="text" name="subject" required><br>
    質問内容 : 
    <textarea name="text" required></textarea><br>
    画像ファイル : 
    <input type="file" name="post_image" accept="image/*"><br>
    テキストファイル : 
    <input type="file" name="post_file" accept="text/*"><br>
 
    <input type="submit" value="登録">
</form>