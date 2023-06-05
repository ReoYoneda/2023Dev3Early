<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }

    require_once "A_DBManager.php";
    $get = new DBManager();
    $user = $get->get_user_info($_SESSION["userID"]);
?>

<input type="button" onclick="location.href='A_G1-4-1.php'" value="みんなの投稿">
<input type="button" onclick="location.href='A_G1-6-1-1.php'" value="じぶんの投稿">
<input type="button" onclick="location.href='A_G1-7.php'" value="ランキング">
<input type="button" onclick="location.href='A_G1-8.php'" value="開催イベント">
<input type="button" onclick="location.href='A_G1-9-1.php'" value="ステータス">
<input type="button" onclick="location.href='A_G1-10.php'" value="ヘルプ">

<h3>ユーザ情報編集</h3>

<form action="A_G1-9-3.php" method="post">
    ログインID : 
    <input type="text" name="loginID" value="<?php echo $user["user_loginid"] ?>" required><br>
    ニックネーム : 
    <input type="text" name="nickname" value="<?php echo $user["user_name"] ?>" required><br>
    学科 : 
    <input type="text" name="course" value="<?php echo $user["user_course"] ?>" required><br>
    専攻 : 
    <input type="text"  name="major" value="<?php echo $user["user_major"] ?>"><br>
    学年 : 
    <select name="grade" required>
        <option value=1 <?php if($user["user_grade"]==1){echo "selected";} ?>>１年生</option>
        <option value=2 <?php if($user["user_grade"]==2){echo "selected";} ?>>２年生</option>
        <option value=3 <?php if($user["user_grade"]==3){echo "selected";} ?>>３年生</option>
        <option value=4 <?php if($user["user_grade"]==4){echo "selected";} ?>>４年生</option>
    </select><br>
    クラス名 : 
    <input type="text" name="classname" value="<?php echo $user["user_classname"] ?>"><br>
    得意科目 : 
    <input type="text" name="Fsubject" value="<?php echo $user["user_Fsubject"] ?>"><br>
 
    <input type="button" onclick="history.back()" value="戻る">
    
    <input type="submit" value="次へ">
    
</form>