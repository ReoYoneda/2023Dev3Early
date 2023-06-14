<?php
require_once "A_DBManager.php";
$create = new DBManager();
$create->Create_test($_POST["loginID"],$_POST["password"],$_POST["nickname"],$_POST["course"],
                $_POST["major"],$_POST["grade"],$_POST["classname"],$_POST["Fsubject"],
                $_POST["trp"],$_POST["rnum"],$_POST["rvalue"],$_POST["snum"],$_POST["svalue"]);
echo "新規登録が完了しました";
?>
<form action="A_Create_test01_3.php" method="POST">
    <input type="hidden" name="loginID" value="<?php echo $_POST["loginID"]?>">
    <input type="submit" value="click">
</form>