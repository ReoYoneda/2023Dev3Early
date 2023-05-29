<?php
    require_once "A_DBManager.php";
    $create = new DBManager();
    $search = $create->get_user_info_test($_POST['loginID']);
    $row = $search[0];
    if($row['evaluation_receivednum']!=0){
        $ReceivedAvg = number_format($row['evaluation_receivedvalue']/$row['evaluation_receivednum'],1);
    }else{
        $ReceivedAvg = number_format(0.0,1) ;
    }
    if($row['evaluation_sentnum']!=0){
        $SentAvg = number_format($row['evaluation_sentvalue']/$row['evaluation_sentnum'],1);
    }else{
        $SentAvg = number_format(0.0,1) ;
    }
    echo    "ログインID　：".$row['user_loginid']."<br>
            ニックネーム：".$row['user_name']."<br>
            学科名　　　：".$row['user_course']."<br>
            専攻名　　　：".$row['user_major']."<br>
            学年　　　　：".$row['user_grade']."<br>
            クラス名　　：".$row['user_classname']."<br>
            得意科目　　：".$row['user_Fsubject']."<br><br>
            Lv　　　　　 = ".floor(sqrt(($row['evaluation_trp']+2)*5-9))."<br>
            DP　　　　　= ".(INT)(floor(sqrt(($row['evaluation_trp']+2)*5-9))/10)+1.0."<br>
            TRP　　　　 = ".$row['evaluation_trp']."<br>
            平均被評価値 = ".$ReceivedAvg."<br>
            平均与評価値 = ".$SentAvg;
?>