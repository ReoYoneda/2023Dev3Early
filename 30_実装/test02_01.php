<!DOCTYPE html>
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

    <div class="container" style="min-width: 360px;"><!-- コンテナ　ディスプレイ幅360px以下の画面ではコンテンツを固定サイズにする -->
            
        <div class="row py-2 justify-content-center">
            <div class=" col-sm-10 col-md-8 col-lg-6 col-xl-5">

                <!-- ナビ -->
                <div class="row pb-2 border-bottom">
                    <a class="col" href="test02_00.php"><i class="bi bi-house"></i></a>
                    <a class="col" href="test02_01.php"><i class="bi bi-person-lines-fill"></i></i></a>
                    <a class="col" href="test02_02.php"><i class="bi bi-trophy"></i></a>
                    <a class="col" href="test02_03.php"><i class="bi bi-flag"></i></a>
                    <a class="col" href="test02_04.php"><i class="bi bi-person-circle"></i></a>
                    <a class="col" href="test02_05.php"><i class="bi bi-question-circle"></i></a>
                </div>
                <!--/ナビ -->


                <!-- 見出し -->
                <div class="row mt-2">
                    <div class="h4 text-center">自分の投稿</div>
                </div>
                <!--/見出し -->


                <!-- フォーム -->
                <form action="test01.php" method="POST">

                <div class="row mb-3">
                    <div class="">
                        <label for="userID">ユーザーID</label>
                    </div>
                    <div>
                        <input type="text" name="userID" id="userID" placeholder="userID" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="userID">ユーザーID</label>
                        <input type="password" name="password" placeholder="password" required>
                    </div>
                </div>

                <div class="row mb-3 pt-3
                            justify-content-between">

                    <div class="col-3">
                        <div>
                            <div>
                                <input type="button" value="戻る" onclick="history.back()">
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-3">
                        <div>
                            <input type="submit" class="blue" value="ログイン">
                        </div>
                    </div>
                    
                </div>
                <div class="row mb-3 pt-3
                            justify-content-between">

                    <div class="col-3">
                        <div>
                            <input type="button" value="戻る" onclick="location.href='test02.php'">
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