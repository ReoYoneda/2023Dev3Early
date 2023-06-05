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

<h3>回答評価</h3>

<input type="button" onclick="history.back()" value="戻る">

<style>
    input[type=radio]{
        display: none;
    }
</style>

<form action="A_G1-6-1-3(b).php?postID=<?php echo $_GET['postID'] ?>" method="POST">
<?php  
    require_once "A_DBManager.php";
    $get = new DBManager();
    $postID = $_GET["postID"];

    $users = $get->get_evaluate_users($postID);
    foreach($users as $user){
        $userInfo = $get->get_user_info($user["user_id"]);
        echo
        '<div>----------------------------------------------------------------------------<br>'.
        '名前　　 : '.$userInfo["user_name"].'<br>
        評価点　 : 
        <input type="radio" name="radio'.$user['user_id'].'" id="r1'.$user['user_id'].'" value="1" onchange="changeLabel1('."'".$user['user_id']."'".')">
        <label for="r1'.$user['user_id'].'" id="L1'.$user['user_id'].'">★</label>
        <input type="radio" name="radio'.$user['user_id'].'" id="r2'.$user['user_id'].'" value="2" onchange="changeLabel2('."'".$user['user_id']."'".')">
        <label for="r2'.$user['user_id'].'" id="L2'.$user['user_id'].'">★</label>
        <input type="radio" name="radio'.$user['user_id'].'" id="r3'.$user['user_id'].'" value="3" checked onchange="changeLabel3('."'".$user['user_id']."'".')">
        <label for="r3'.$user['user_id'].'" id="L3'.$user['user_id'].'">★</label>
        <input type="radio" name="radio'.$user['user_id'].'" id="r4'.$user['user_id'].'" value="4" onchange="changeLabel4('."'".$user['user_id']."'".')">
        <label for="r4'.$user['user_id'].'" id="L4'.$user['user_id'].'">☆</label>
        <input type="radio" name="radio'.$user['user_id'].'" id="r5'.$user['user_id'].'" value="5" onchange="changeLabel5('."'".$user['user_id']."'".')">
        <label for="r5'.$user['user_id'].'" id="L5'.$user['user_id'].'">☆</label>
        </div>';
    }
?>
----------------------------------------------------------------------------<br>
<input type="submit" value="送信">
</form>
<script>
    function changeLabel1(id){
        var label;
        label = document.getElementById("L1"+id);
        label.textContent = "★";
        label = document.getElementById("L2"+id);
        label.textContent = "☆";
        label = document.getElementById("L3"+id);
        label.textContent = "☆";
        label = document.getElementById("L4"+id);
        label.textContent = "☆";
        label = document.getElementById("L5"+id);
        label.textContent = "☆";
    }
    function changeLabel2(id){
        var label;
        label = document.getElementById("L1"+id);
        label.textContent = "★";
        label = document.getElementById("L2"+id);
        label.textContent = "★";
        label = document.getElementById("L3"+id);
        label.textContent = "☆";
        label = document.getElementById("L4"+id);
        label.textContent = "☆";
        label = document.getElementById("L5"+id);
        label.textContent = "☆";
    }
    function changeLabel3(id){
        var label;
        label = document.getElementById("L1"+id);
        label.textContent = "★";
        label = document.getElementById("L2"+id);
        label.textContent = "★";
        label = document.getElementById("L3"+id);
        label.textContent = "★";
        label = document.getElementById("L4"+id);
        label.textContent = "☆";
        label = document.getElementById("L5"+id);
        label.textContent = "☆";
    }
    function changeLabel4(id){
        var label;
        label = document.getElementById("L1"+id);
        label.textContent = "★";
        label = document.getElementById("L2"+id);
        label.textContent = "★";
        label = document.getElementById("L3"+id);
        label.textContent = "★";
        label = document.getElementById("L4"+id);
        label.textContent = "★";
        label = document.getElementById("L5"+id);
        label.textContent = "☆";
    }
    function changeLabel5(id){
        var label;
        label = document.getElementById("L1"+id);
        label.textContent = "★";
        label = document.getElementById("L2"+id);
        label.textContent = "★";
        label = document.getElementById("L3"+id);
        label.textContent = "★";
        label = document.getElementById("L4"+id);
        label.textContent = "★";
        label = document.getElementById("L5"+id);
        label.textContent = "★";
    }
</script>