<form action="A_G1-3-3(b).php" method="post">
    <h1>新規ユーザー登録</h1>
    <input type="hidden" name="loginID" value="<?php echo $_POST["loginID"] ?>">
    <input type="hidden" name="password" value="<?php echo $_POST["password"] ?>">
    <input type="hidden" name="nickname" value="<?php echo $_POST["nickname"] ?>">
    <input type="hidden" name="course" value="<?php echo $_POST["course"] ?>">
    <input type="hidden" name="major" value="<?php echo $_POST["major"] ?>">
    <input type="hidden" name="grade" value="<?php echo $_POST["grade"] ?>">
    <input type="hidden" name="classname" value="<?php echo $_POST["classname"] ?>">
    <input type="hidden" name="Fsubject" value="<?php echo $_POST["Fsubject"] ?>">

    <?php echo
        'ログインID：'.$_POST['loginID'].'<br>
         パスワード：'.$_POST['password'].'<br>
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