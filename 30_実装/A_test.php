<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }
    
    require_once "A_DBManager.php";
    $get = new DBManager();
    $users = $get->get_users_info();
?>
<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Status</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=0.85" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
</head>

<style>
    .tdiv{
        border: 2px solid #f0f0f0;
        border-radius: 4px;
        box-shadow: 0px 0px 4px 2px #ccc;
    }
    .rank{
        float: left;
        width: 13%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-shadow: 1px 1px 1px #ccc;
    }
    .rank,
    .rate{
        color: #82c;
        font-weight: bold;
    }
    table{
        width: 87%;
    }
    .tdiv,
    td.rate{
        background-color: #f0f0f0;
    }
    td{
        background-color: #fcfcfc;
        border: 2px solid #f0f0f0;
        border-radius: 2px;
        box-shadow: 0px 0px 1.5px 1.5px #ccc inset;
    }
    td.rate{
        width: 18%;
        text-align: right;
    }
    td.rate,
    td.avg,
    td.lv,
    td.dp{
        width: 22%;
    }
    td.course{
        width: 38%;
    }
    td.classname{
        width: 25%;
    }
    td.grade{
        width: 13%;
    }
</style>

<body>

    <div class="container" style="min-width: 450px;"><!-- コンテナ　ディスプレイ幅360px以下の画面ではレイアウト比率を固定にする -->
            
        <div class="row py-2 justify-content-center"><!-- ヘッダー用コンテナ -->

            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5"><!-- ヘッダー用のコンテナサイズ -->

                <!-- ナビ -->
                <div class="row nav">
                    <a class="col" href="Af_G1-4-1.php" title="みんなの投稿"><i class="bi bi-house-door"></i></a>
                    <a class="col" href="Af_G1-6-1-1.php" title="じぶんの投稿"><i class="bi bi-person-lines-fill"></i></i></a>
                    <a class="col" href="Af_G1-7.php" title="ランキング"><i class="bi bi-trophy"></i></a>
                    <a class="col" href="Af_G1-8.php" title="開催イベント"><i class="bi bi-flag"></i></a>
                    <a class="col" href="Af_G1-9-1.php" title="ステータス"><i class="bi bi-person-circle"></i></a>
                    <a class="col" href="Af_G1-10.php" title="ヘルプ？"><i class="bi bi-question-circle"></i></a>
                </div>
                <!--/ナビ -->

                <!-- 見出し -->
                <div class="row mt-4">
                    <div class="h4 text-center" title="全ユーザーのランキングです">
                        ランキング
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-11 col-md-9 col-lg-6 col-xl-5"><!-- フォーム用のコンテナサイズ -->

                <!-- ステータス -->
                <?php
                foreach($users as $user){
                    echo
                '<div class="row mt-3">
                    <div class="px-0 tdiv">

                        <div class="rank">'.$user["user_rank"].'位</div>
                        <table>
                            <tbody>
                                <tr>
                                    <td>TRP : '.$user["evaluation_trp"].'</td><td class="lv">Lv : '.$user["user_lv"].'</td><td class="dp">DP : '.$user["user_dp"].'</td><td class="rate">'.$user["user_rate"].'</td>
                                </tr>
                            </tbody>
                        </table>
                        <table>
                            <tbody>
                                <tr>
                                    <td>'.$user["user_name"].'</td>      <td class="avg">被評 : '.$user["user_Ravg"].'</td><td class="avg">与評 : '.$user["user_Savg"].'</td>
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
                    
                    </div>
                </div>';
                }
                ?>

                <!--/ステータス -->

            </div>

        </div>

    </div>
    
</body>
</html>