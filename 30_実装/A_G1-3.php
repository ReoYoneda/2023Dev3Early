<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }
?>

<h3>ステータス</h3>

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
            Lv　 　 　 　 = ".$row['user_lv']."<br>
            DP　　　　　= ".$row['user_dp']."<br>
            TRP　　　　 = ".$row['evaluation_trp']."<br>
            NRP　　　　 = ".$row['user_nrp']."<br>
            ランキング　 = ".$row['user_rank']." 位  ( ".$row["user_rate"]." )<br>
            被評価平均値 = ".$row['user_Ravg']."<br>
            与評価平均値 = ".$row['user_Savg']."<br>
            ユーザー数 　= ".$row['user_cnt'];
?>
<br>
<input type="button" value="ログアウト" onclick="location.href='A_LogOut.php'">
　
<input type="button" onclick="location.href='A_G1-4-1.php'" value="みんなの投稿">