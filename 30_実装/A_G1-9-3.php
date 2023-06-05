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

<h3>編集内容確認</h3>

<form action="A_G1-9-3(b).php" method="post">

    <input type="hidden" name="loginID" value="<?php echo $_POST["loginID"] ?>">
    <input type="hidden" name="nickname" value="<?php echo $_POST["nickname"] ?>">
    <input type="hidden" name="course" value="<?php echo $_POST["course"] ?>">
    <input type="hidden" name="major" value="<?php echo $_POST["major"] ?>">
    <input type="hidden" name="grade" value="<?php echo $_POST["grade"] ?>">
    <input type="hidden" name="classname" value="<?php echo $_POST["classname"] ?>">
    <input type="hidden" name="Fsubject" value="<?php echo $_POST["Fsubject"] ?>">

    <?php echo
        'ログインID：'.$_POST['loginID'].'<br>
         ニックネーム：'.$_POST['nickname'].'<br>
         学科：'.$_POST['course'].'<br>
         専攻：'.$_POST['major'].'<br>
         学年：'.$_POST['grade'].'<br>
         クラス：'.$_POST['classname'].'<br>
         得意科目：'.$_POST['Fsubject'].'<br>';
    ?>
 
    <input type="button" onclick="history.back()" value="戻る">

    <input type="submit" value="登録">
    
</form>