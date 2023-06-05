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

<h3>ステータス</h3>

<input type="button" onclick="location.href='A_LogOut.php'" value="ログアウト">
<input type="button" onclick="location.href='A_G1-9-2.php'" value="編集"><br>

<?php
    require_once "A_DBManager.php";
    $get = new DBManager();
    $row = $get->get_user_info($_SESSION['userID']);
    
    echo    "ログインID　：".$row['user_loginid']."<br>
            ニックネーム：".$row['user_name']."<br>
            学科名　　　：".$row['user_course']."<br>
            専攻名　　　：".$row['user_major']."<br>
            学年　　　　：".$row['user_grade']."<br>
            クラス名　　：".$row['user_classname']."<br>
            得意科目　　：".$row['user_Fsubject']."<br><br>
            Lv　　　　　 = ".$row['user_lv']."<br>
            DP　　　　　= ".$row['user_dp']."<br>
            TRP　　　　 = ".$row['evaluation_trp']."<br>
            NRP　　　　 = ".$row['user_nrp']."<br>
            ランキング　 = ".$row['user_rank']." 位  ( ".$row["user_rate"]." )<br>
            平均被評価値 = ".$row['user_Ravg']."<br>
            平均与評価値 = ".$row['user_Savg']."<br>
            ユーザー数 　= ".$row['user_cnt'];

?>