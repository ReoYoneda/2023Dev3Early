<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_phptest02_1.php');
    }

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
            Lv　　　　　 = ".$row['Lv']."<br>
            DP　　　　　= ".$row['DP']."<br>
            TRP　　　　 = ".$row['evaluation_trp']."<br>
            NRP　　　　 = ".$row['NRP']."<br>
            ランキング　 = ".$row['user_rank']." 位  ( ".$row["user_rate"]." )<br>
            平均被評価値 = ".$row['Ravg']."<br>
            平均与評価値 = ".$row['Savg']."<br>
            ユーザー数 　= ".$row['user_cnt'];

?>
<br>
<input type="button" onclick="location.href='A_LogOut.php'" value="ログアウト">
<input type="button" onclick="location.href='A_phptest04_1.php'" value="みんなの投稿へ">
