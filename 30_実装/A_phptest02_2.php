<?php
    require_once "DBManager.php";
    $login = new DBManager();
    $search = $login->login($_POST["loginID"],$_POST["password"]);
    if(!empty($search)){
        echo "ログイン成功！ようこそ".$search[0]["user_name"]."さん！";
    }else{
        echo "メールアドレスまたはパスワードが違います。";
    }
?>