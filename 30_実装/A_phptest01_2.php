<?php
require_once "DBManager.php";
$insert = new DBManager();
$insert->create($_POST["loginID"],$_POST["password"],$_POST["nickname"],$_POST["course"],
                $_POST["major"],$_POST["grade"],$_POST["classname"],$_POST["Fsubject"]);
echo "新規登録が完了しました";
echo "ログインID : ".$_POST["loginID"];
echo "<br>パスワード : ".$_POST["password"];
echo "<br>ニックネーム : ".$_POST["nickname"];
?>