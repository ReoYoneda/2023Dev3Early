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

<h3>ランキング</h3>

<?php
    require_once "A_DBManager.php";
    $get = new DBManager();
    $users = $get->get_users_info();
    foreach($users as $user){
        echo
        '<div class="tdiv">
            <div class="rank">'.$user["user_rank"].'位</div>
            <table>
                <tbody>
                    <tr>
                        <td>'.$user["user_name"].'</td>      <td class="rate">'.$user["user_rate"].'</td>
                    </tr>
                </tbody>
            </table>
            <table class="border">
                <tbody>
                    <tr>
                        <td>TRP : '.$user["evaluation_trp"].'</td><td class="lv">Lv : '.$user["user_lv"].'</td><td class="dp">DP : '.$user["user_dp"].'</td><td class="avg">被評 : '.$user["user_Ravg"].'</td><td class="avg">与評 : '.$user["user_Savg"].'</td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tbody>
                    <tr>
                        <td class="course">'.$user["user_course"].'</td>      <td>'.$user["user_major"].'</td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tbody>
                    <tr>
                        <td class="grade">'.$user["user_grade"].'年</td>      <td class="classname">'.$user["user_classname"].'</td>      <td>'.$user["user_Fsubject"].'</td>
                    </tr>
                </tbody>
            </table>
        </div>';
    }
?>
<style>
    .tdiv{
        width: fit-content;
        border: 2px solid #000;
        border-radius: 4px;
        margin-bottom: 10px;
        height: fit-content;
    }
    .tdiv,
    td.rate{
        background-color: #eef;
    }
    .rank{
        float: left;
        width: 70px;
        height: 100%;
        /*border-right: 1px solid;*/
        text-align: center;
        line-height: calc(118px);
    }
    table{
        width: 450px;
    }
    
    td{
        background-color: #fff;
    }
    td.rate{
        text-align: right;
        width: 80px;
    }
    td.avg,
    td.lv{
        width: 80px;
    }
    td.dp{
        width: 65px;
    }
    td.course{
        width: 160px;
    }
    td.grade{
        width: 58px;
    }
    td.classname{
        width: 98px;
    }
</style>