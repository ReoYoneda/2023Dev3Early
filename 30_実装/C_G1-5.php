<!DOCTYPE html>
<html>
    <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>投稿画面</title>
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
            
            <div class="row py-2 justify-content-center">
    
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">
    
                    <!-- ナビ -->
                    <div class="row nav">
                        <a class="col" href="test02_00.php" title="みんなの投稿"><i class="bi bi-house-door"></i></a>
                        <a class="col" href="test02_01.php" title="じぶんの投稿"><i class="bi bi-person-lines-fill"></i></i></a>
                        <a class="col" href="test02_02.php" title="ランキング"><i class="bi bi-trophy"></i></a>
                        <a class="col" href="test02_03.php" title="開催イベント"><i class="bi bi-flag"></i></a>
                        <a class="col" href="test02_04.php" title="ステータス"><i class="bi bi-person-circle"></i></a>
                        <a class="col" href="test02_05.php" title="ヘルプ？"><i class="bi bi-question-circle"></i></a>
                    </div>
                    <!--/ナビ -->
    
                    <!-- 見出し -->
                    <div class="row mt-4">
                        <div class="h4 text-center">
                            投稿
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-10 col-sm-8 col-md-7 col-lg-5 col-xl-4"><!-- フォーム用のコンテナサイズ -->

                <!-- フォーム -->
                <form action="test01.php" method="POST">
                <!--タイトル-->
                <div class="row mb-3">
                    <div>
                        <label for="userID">タイトル</label>
                    </div>
                    <div>
                        <input type="text" name="userID" id="userID" placeholder="タイトル" required>
                    </div>
                </div>

                <!--授業科目-->
                <div class="row mb-3">
                    <div>
                        <label for="userID">授業科目</label>
                    </div>
                    <div>
                        <input type="text" name="userID" id="userID" placeholder="授業" required>
                    </div>
                </div>

                <!--内容-->
                <div class="row mb-3">
                    <div>
                        <label for="post_text">内容</label>
                    </div>
                    <div>
                        <textarea name="post_text" id="post_text" rows="8" required></textarea>
                    </div>
                </div>
                <!--画像-->
                <div class="row mb-3">
                    <div>
                        <label for="post_text">画像</label>
                    </div>
                    
                </div>
                <form action="test.html" method="post" enctype="multipart/form-data" >
                    <label>
                        <input type="file"name="file" onchange="previewFile(this);">
                    </label>
                </form>
                <div class="img-wrap">
                    <img id="preview">
                </div>
                <script>
                    function previewFile(hoge){
                        var fileData = new FileReader();
                        fileData.onload = (function() {
                        //id属性が付与されているimgタグのsrc属性に、fileReaderで取得した値の結果を入力することで
                        //プレビュー表示している
                        document.getElementById('preview').src = fileData.result;
                        });
                        fileData.readAsDataURL(hoge.files[0]);
                    }
                </script>
                <!--ファイル-->
                <div class="row mb-3">
                    <div>
                        <label for="post_text">ファイル</label>
                    </div>
                    <div>
                        <input type="file">
                    </div>
                </div>
                <!--戻る-->
                <div class="row mb-3
                            justify-content-between">
                <div class="col-4">
                    <div>
                        <label>　</label>
                    </div>
                    <div>
                        <input type="button" value="Back" onclick="history.back()">
                    </div>
               </div>
                <!--投稿-->
                <div class="col-4">
                    <div>
                        <label>　</label>
                    </div>
                    <div>
                        <input type="submit" class="black" value="投稿">
                    </div>
                </div>
                </div>


    </body>
</html>