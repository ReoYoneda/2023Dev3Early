<<<<<<< HEAD
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
                        <td>'.$user["user_name"].'</td>      <td class="rate">'.$user["user_rate"].'　</td>
                    </tr>
                </tbody>
            </table>
            <table class="border">
                <tbody>
                    <tr>
                        <td>TRP: '.$user["evaluation_trp"].'</td><td>Lv : '.$user["user_lv"].'</td><td>DP : '.$user["user_dp"].'</td><td>被評: '.$user["user_Ravg"].'</td><td>与評: '.$user["user_Savg"].'</td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tbody>
                    <tr>
                        <td>'.$user["user_course"].'</td>      <td>'.$user["user_major"].'</td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tbody>
                    <tr>
                        <td>'.$user["user_grade"].'年</td>      <td>'.$user["user_classname"].'</td>      <td>'.$user["user_Fsubject"].'</td>
                    </tr>
                </tbody>
            </table>
        </div>';
    }
?>
<style>
    .tdiv{
        width: fit-content;
        border: 1.5px solid #444;
        border-radius: 8px;
        margin-bottom: 10px;
        background-color: #fafafa;
    }
    .rank{
        float: left;
        width: 70px;
        height: 120px;
        border-right: 1px solid;
        text-align: center;
        line-height: calc(120px);
    }
    table{
        width: 400px;
    }
    table.border{
        border-bottom:  1px solid;
    }
    td{
        background-color: #fff;
        background-color: #fafafa;
    }
    td.rate{
        text-align: right;
    }
</style>
<!--
<div class="tdiv">
    <div class="rank">a</div>
    <table>
        <tbody>
            <tr>
                <td>a</td>      <td>a</td>
            </tr>
        </tbody>
    </table>
    <table class="border">
        <tbody>
            <tr>
                <td>a</td>      <td>a</td>      <td>a</td>      <td>a</td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td>a</td>      <td>a</td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td>a</td>      <td>a</td>      <td class="tdf">a</td>
            </tr>
        </tbody>
    </table>
</div>
-->
=======
<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>ログイン</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style_test02.css">
</head>

<body>

    <div class="container" style="min-width: 360px;"><!-- コンテナ　ディスプレイ幅360px以下の画面ではレイアウト比率を固定にする -->
            
        <div class="row py-2 justify-content-center"><!-- ヘッダー用コンテナ -->

            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5"><!-- ヘッダー用のコンテナサイズ -->

                <!-- ナビ -->
                <div class="row nav">
                    <a class="col" href="A_G-1-4-1.php" title="みんなの投稿"><i class="bi bi-house-door"></i></a>
                    <a class="col" href="A1-6-1-1.php" title="じぶんの投稿"><i class="bi bi-person-lines-fill"></i></i></a>
                    <a class="col" href="A_G1-7.php" title="ランキング"><i class="bi bi-trophy"></i></a>
                    <a class="col" href="A_G-1-8.php" title="開催イベント"><i class="bi bi-flag"></i></a>
                    <a class="col" href="A_G-1-9-1.php" title="ステータス"><i class="bi bi-person-circle"></i></a>
                    <a class="col" href="A_G1-10.php" title="ヘルプ？"><i class="bi bi-question-circle"></i></a>
                </div>
                <!--/ナビ -->

                <!-- 見出し -->
                <div class="row mt-4">
                    <div class="h4 text-center">
                        ランキング画面
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-10 col-sm-8 col-md-7 col-lg-5 col-xl-4"><!-- フォーム用のコンテナサイズ -->

                <div class="flexbox">
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                </div>

                
</body>
</html>
>>>>>>> 4441614ec123764842a038348df576dd1a3aa9c7
