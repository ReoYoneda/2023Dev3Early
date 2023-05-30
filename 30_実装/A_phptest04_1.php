<form action="A_phptest01_2.php" method="post" enctype="multipart/form-data">
    <h1>投稿</h1>
    ログインID : 
    <input type="post_title" name="post_title" required><br>
    パスワード：
    <input type="text" name="subject" required><br>
    
    <textarea name="post_text" rows="10" cols="50"></textarea><br>
    画像
    <input type="file" name="post_image" accept="image/*"><br>
    ファイル
    <input type="file" name="post_file"><br>
 
    <input type="submit" value="登録">
</form>