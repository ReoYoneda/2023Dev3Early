<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:G1-1.php');
    }

    require_once "A_DBManager.php";
    $get = new DBManager();
    $row = $get->get_user_info($_SESSION['userID']);
?>
<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Status</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>
    
<script src="script/bubbly-bg.js"></script>
<script>
    if(localStorage.getItem("backgroundColor") === null){
        bubbly({
            background: () => "#eee"
        });
    }else{
        bubbly({
            background: () => localStorage.getItem("backgroundColor")
        });
    }
</script>

    <div class="container">
            
        <div class="row justify-content-center"><!-- ヘッダー用コンテナ -->

            <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6"><!-- ヘッダー用のコンテナサイズ -->

                <!-- ナビ -->
                <div class="nav">
                    <a class="nav-col" href="G1-4-1.php" title="みんなの投稿"><i class="bi bi-house-door"></i></a>
                    <a class="nav-col" href="G1-6-1-1.php" title="じぶんの投稿"><i class="bi bi-person-lines-fill"></i></i></a>
                    <a class="nav-col" href="G1-7.php" title="ランキング"><i class="bi bi-trophy"></i></a>
                    <a id="nav-col-fixed" class="nav-col" href="G1-5.php" title="投稿"><i class="bi bi-plus-circle"></i>
                    <a class="nav-col" href="G1-8.php" title="開催イベント"><i class="bi bi-flag"></i></a>
                    <a class="nav-col" href="G1-9-1.php" title="ステータス"><i class="bi bi-person-circle"></i></a>
                    <a class="nav-col" href="G1-10.php" title="ヘルプ？"><i class="bi bi-question-circle"></i></a>
                </div>
                <!--/ナビ -->

                <!-- 見出し -->
                <div class="row">
                    <div class="header-title" title="変更したいときは [変更] を押してください">
                        ステータス
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-10 col-sm-8 col-md-7 col-lg-5 col-xl-4"><!-- フォーム用のコンテナサイズ -->

                <!-- ステータス -->

                <div class="row mb">
                    <div>
                        <label for="Fsubject">ステータス</label>
                    </div>
                    <div class="row status">
                        <div class="col-1 col-sm-2"></div><div class="td col-4 col-sm-3">現在のレベル</div><div class="td text-center col-2">：</div><div class="td text-right col-3"><?php echo $row['user_lv'] ?>　 　</div><div class="td col-2"></div>
                        <div class="td col-1 col-sm-2"></div><div class="td col-4 col-sm-3">要求レベル</div><div class="td text-center col-2">：</div><div class="td text-right col-3"><?php echo $row['user_dp'] ?>　 　</div><div class="td col-2"></div>
                        <div class="td col-1 col-sm-2"></div><div class="td col-4 col-sm-3">累計獲得RP</div><div class="td text-center col-2">：</div><div class="td text-right col-3"><?php echo $row['evaluation_trp'] ?>　 　</div><div class="td col-2"></div>
                        <div class="td col-1 col-sm-2"></div><div class="td col-4 col-sm-3">次のLvまで</div><div class="td text-center col-2">：</div><div class="td text-right col-3"><?php echo $row['user_nrp'] ?>　 　</div><div class="td col-2"></div>
                        <div class="td col-1 col-sm-2"></div><div class="td col-4 col-sm-3">ランキング</div><div class="td text-center col-2">：</div><div class="td text-right col-3"><?php echo $row['user_rank'] ?> 位　</div><div class="td col-2"></div>
                        <div class="td col-1 col-sm-2"></div><div class="td col-4 col-sm-3">ユーザーレート</div><div class="td text-center col-2">：</div><div class="td text-right col-3"><?php echo $row['user_rate'] ?> 　</div><div class="td col-2"></div>
                        <div class="td col-1 col-sm-2"></div><div class="td col-4 col-sm-3">被評価平均</div><div class="td text-center col-2">：</div><div class="td text-right col-3"><?php echo $row['user_Ravg'] ?>　 　</div><div class="td col-2"></div>
                        <div class="td col-1 col-sm-2"></div><div class="td col-4 col-sm-3">与評価平均</div><div class="td text-center col-2">：</div><div class="td text-right col-3"><?php echo $row['user_Savg'] ?>　 　</div><div class="td col-2"></div>
                    </div>
                </div>
                
                <div class="row mb
                            justify-content-between">

                    <div class="col-4">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="button" value="ログアウト" onclick="location.href='G1-LogOut.php'">
                        </div>
                    </div>

                    <div class="col-4">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="button" class="black" value="変更" onclick="location.href='G1-9-2.php'">
                        </div>
                    </div>
                    
                </div>

                <div class="row mb">
                    <div>
                        <label for="loginID">ログインID</label>
                    </div>
                    <div>
                        <input type="text" class="input-display" name="loginID" id="loginID" value="<?php echo $row['user_loginid'] ?>" disabled>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="password">パスワード</label>
                    </div>
                    <div>
                        <input type="password" class="input-display" name="password" id="password" value="<?php echo $row['user_password'] ?>" disabled>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="nickname">ニックネーム</label>
                    </div>
                    <div>
                        <input type="text" class="input-display" name="nickname" id="nickname" value="<?php echo $row['user_name'] ?>" disabled>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="course">学科</label>
                    </div>
                    <div>
                        <input type="text" name="course" id="course" value="<?php echo $row['user_course'] ?>" disabled>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="major">専攻</label>
                    </div>
                    <div>
                        <input type="text" name="major" id="major" value="<?php echo $row['user_major'] ?>" disabled>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="grade">学年</label>
                    </div>
                    <div>
                        <select name="grade" id="grade" disabled>
                            <option value="" style="color: #bbb">選択してください</option>
                            <option value=1 <?php if($row["user_grade"]==1){echo "selected";} ?>>１年生</option>
                            <option value=2 <?php if($row["user_grade"]==2){echo "selected";} ?>>２年生</option>
                            <option value=3 <?php if($row["user_grade"]==3){echo "selected";} ?>>３年生</option>
                            <option value=4 <?php if($row["user_grade"]==4){echo "selected";} ?>>４年生</option>
                        </select>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="classname">クラス</label>
                    </div>
                    <div>
                        <input type="text" name="classname" id="classname" value="<?php echo $row['user_classname'] ?>" disabled>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="Fsubject">得意科目</label>
                    </div>
                    <div>
                        <input type="text" name="Fsubject" id="Fsubject" value="<?php echo $row['user_Fsubject'] ?>" disabled>
                    </div>
                </div>

                <!--/ステータス -->

                <div class="row mb-4
                            justify-content-between">
                    <div>
                        <label>背景</label>
                    </div>
                    <div class="col-3">
                        <div>
                            <input type="button" onclick="changeBgColor('#f5daf0')" style="background-color: #fad5ea;">
                        </div>
                    </div>
                    <div class="col-3">
                        <div>
                            <input type="button" onclick="changeBgColor('#ffefc2')" style="background-color: #ffefc2;">
                        </div>
                    </div>
                    <div class="col-3">
                        <div>
                            <input type="button" onclick="changeBgColor('#ced')" style="background-color: #ced;">
                        </div>
                    </div>
                    <div class="col-3">
                        <div>
                            <input type="button" onclick="changeBgColor('#c8e3fa')" style="background-color: #c8e3fa;">
                        </div>
                    </div>
                </div>
                <div class="row mb
                            justify-content-between">
                    <div class="col-3">
                        <div>
                            <input type="button" onclick="changeBgColor('#d7dafa')" style="background-color: #d7dafa;">
                        </div>
                    </div>
                    <div class="col-3">
                        <div>
                            <input type="button" onclick="changeBgColor('#c0c0c0')" style="background-color: #c0c0c0;">
                        </div>
                    </div>
                    <div class="col-3">
                        <div>
                            <input type="button" onclick="changeBgColor('#eaeaea')" style="background-color: #eaeaea;">
                        </div>
                    </div>
                    <div class="col-3">
                        <div>
                            <input type="button" onclick="changeBgColor('#fff')" style="background-color: #fff;">
                        </div>
                    </div>
                </div>
                
            </div>

        </div>

    </div>
    
</body>

<script>
    function changeBgColor(colorCode){
        localStorage.setItem("backgroundColor", colorCode);
        location.reload();
    }

    function changeThemeColor(themeColor){
        if(themeColor){
            localStorage.setItem("themeColor", true);
        }else{
            localStorage.setItem("themeColor", false);
        }
        location.reload();
    }
</script>

</html>