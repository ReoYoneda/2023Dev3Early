<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Check</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=0.85" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style_test02.css">
</head>

<style>
    input[type="text"],
    input[type="password"],
    select{
        border: none;
        background-color: transparent;
    }

    input[type="text"]:hover,
    input[type="password"]:hover,
    select:hover{
        box-shadow: none;
    }

    /* 矢印消去 */
    select {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    }
    /* ie対応 */
    select::-ms-expand {
    display: none;
    }
    /* /矢印消去 */
</style>

<body>

    <div class="container" style="min-width: 450px;"><!-- コンテナ　ディスプレイ幅360px以下の画面ではレイアウト比率を固定にする -->
            
        <div class="row py-2 justify-content-center"><!-- ヘッダー用コンテナ -->

            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5"><!-- ヘッダー用のコンテナサイズ -->

                <!-- 見出し -->
                <div class="row mt-4">
                    <div class="h4 text-center" title="情報をを入力して [Next]を押してください">
                        登録内容確認
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-10 col-sm-8 col-md-7 col-lg-5 col-xl-4"><!-- フォーム用のコンテナサイズ -->

                <!-- フォーム -->
                <form action="Af_G1-3.php" method="POST">

                <div class="row mb-3">
                    <div>
                        <label for="userID">ログインID</label>
                    </div>
                    <div>
                        <input type="text" name="userID" id="userID" value="loginID" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="password">パスワード</label>
                    </div>
                    <div>
                        <input type="password" name="password" id="password" value="password" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="nickname">ニックネーム</label>
                    </div>
                    <div>
                        <input type="text" name="nickname" id="nickname" value="nickname" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="course">学科</label>
                    </div>
                    <div>
                        <input type="text" name="course" id="course" value="course" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="major">専攻</label>
                    </div>
                    <div>
                        <input type="text" name="major" id="major" value="major" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="grade">学年</label>
                    </div>
                    <div>
                        <select class="select" name="grade" id="grade" disabled>
                            <option value="" style="color: #bbb">選択してください</option>
                            <option value=1 selected>１年生</option>
                            <option value=2>２年生</option>
                            <option value=3>３年生</option>
                            <option value=4>４年生</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="classname">クラス</label>
                    </div>
                    <div>
                        <input type="text" name="classname" id="classname" value="classname" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="Fsubject">得意科目</label>
                    </div>
                    <div>
                        <input type="text" name="Fsubject" id="Fsubject" value="favorite subject" disabled>
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