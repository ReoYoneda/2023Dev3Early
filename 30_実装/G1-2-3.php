<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Check</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>

    <div class="container">
            
        <div class="row py-2 justify-content-center"><!-- ヘッダー用コンテナ -->

            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5"><!-- ヘッダー用のコンテナサイズ -->

                <!-- 見出し -->
                <div class="row">
                    <div class="header-title" title="情報をを入力して [Next]を押してください">
                        登録内容確認
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-10 col-sm-8 col-md-7 col-lg-5 col-xl-4"><!-- フォーム用のコンテナサイズ -->

                <!-- フォーム -->
                <form action="G1-2-3.php" method="POST">

                <input type="hidden" name="loginID" value="<?php echo $_POST["loginID"] ?>">
                <input type="hidden" name="password" value="<?php echo $_POST["password"] ?>">
                <input type="hidden" name="nickname" value="<?php echo $_POST["nickname"] ?>">
                <input type="hidden" name="course" value="<?php echo $_POST["course"] ?>">
                <input type="hidden" name="major" value="<?php echo $_POST["major"] ?>">
                <input type="hidden" name="grade" value="<?php echo $_POST["grade"] ?>">
                <input type="hidden" name="classname" value="<?php echo $_POST["classname"] ?>">
                <input type="hidden" name="Fsubject" value="<?php echo $_POST["Fsubject"] ?>">

                <div class="row mb-3">
                    <div>
                        <label for="loginID">ログインID</label>
                    </div>
                    <div>
                        <input type="text" name="loginID" id="loginID" value="'.$_POST['loginID'].'" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="password">パスワード</label>
                    </div>
                    <div>
                        <input type="password" name="password" id="password" value="'.$_POST['password'].'" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="nickname">ニックネーム</label>
                    </div>
                    <div>
                        <input type="text" name="nickname" id="nickname" value="'.$_POST['nickname'].'" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="course">学科</label>
                    </div>
                    <div>
                        <input type="text" name="course" id="course" value="'.$_POST['course'].'" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="major">専攻</label>
                    </div>
                    <div>
                        <input type="text" name="major" id="major" value="'.$_POST['major'].'" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="grade">学年</label>
                    </div>
                    <div>
                        <select class="select" name="grade" id="grade" disabled>
                            <option value="" style="color: #bbb">選択してください</option>
                            <option value=1 <?php if($user["user_grade"]==1){echo "selected";} ?>>１年生</option>
                            <option value=2 <?php if($user["user_grade"]==2){echo "selected";} ?>>２年生</option>
                            <option value=3 <?php if($user["user_grade"]==3){echo "selected";} ?>>３年生</option>
                            <option value=4 <?php if($user["user_grade"]==4){echo "selected";} ?>>４年生</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="classname">クラス</label>
                    </div>
                    <div>
                        <input type="text" name="classname" id="classname" value="'.$_POST['classname'].'" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="Fsubject">得意科目</label>
                    </div>
                    <div>
                        <input type="text" name="Fsubject" id="Fsubject" value="'.$_POST['Fsubject'].'" disabled>
                    </div>
                </div>

                <div class="row mb-3
                            justify-content-between">

                    <div class="col-4">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="button" value="戻る" onclick="history.back()">
                        </div>
                    </div>

                    <div class="col-4">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="submit" class="black" value="登録">
                        </div>
                    </div>
                    
                </div>

                </form>
                <!--/フォーム -->

            </div>

        </div>

    </div>
    
</body>
</html>