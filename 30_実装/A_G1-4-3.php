<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }
?>

<form action="A_G1-4-3(b).php" method="post" enctype="multipart/form-data">
    <h1>回答</h1>
    <input type="hidden" name="postID" value="<?php echo $_GET["postID"] ?>">
    回答文 : 
    <textarea name="text" required></textarea><br>
    画像ファイル : 
    <input type="file" name="reply_image" accept="image/*"><br>
    テキストファイル : 
    <input type="file" name="reply_file" accept="text/*, .java, .php, .sql"><br>

    <input type="submit" value="回答">
</form>