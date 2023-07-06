<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:G1-1.php');
    }

    $_SESSION['num']++;
    if($_SESSION['num'] != 1){
        exit;
    }

    require_once "A_DBManager.php";
    $update = new DBManager();
    $update->user_update($_SESSION["userID"],$_POST["loginID"],$_POST["nickname"],$_POST["course"],
                    $_POST["major"],$_POST["grade"],$_POST["classname"],$_POST["Fsubject"]);

?>
<script>
    history.go(-3);
</script>