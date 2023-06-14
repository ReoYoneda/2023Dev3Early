<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style_test02.css">
</head>

<body>

    <div class="container" style="min-width: 450px;"><!-- コンテナ　ディスプレイ幅360px以下の画面ではレイアウト比率を固定にする -->
            
        <div class="row py-2 justify-content-center"><!-- ヘッダー用コンテナ -->

            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5"><!-- ヘッダー用のコンテナサイズ -->

                <!-- 見出し -->
                <div class="row mt-4">
                    <div class="h4 text-center" title="ログインIDとパスワードを入力して [Login]を押してください">
                        ログイン
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
                        <input type="text" name="userID" id="userID" placeholder="loginID" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="password">パスワード</label>
                    </div>
                    <div>
                        <input type="password" name="password" id="password" placeholder="password" required>
                    </div>
                </div>

                <div class="row mb-3
                            justify-content-end">

                    <div class="col-4">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="submit" class="black" value="ログイン">
                        </div>
                    </div>
                    
                </div>
                <!--/フォーム -->

                <div class="row mb-3">
                    <div>
                        <label>　</label>
                    </div>
                    <div class="text-center">
                        <a href="Af_G1-2-1.php" style="color: #63f">新規登録はこちら</a>
                    </div>
                </div>

            </div>

        </div>

    </div>
    
</body>
</html>