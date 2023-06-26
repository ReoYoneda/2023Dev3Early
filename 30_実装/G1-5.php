<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Post</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>

    <div id="modal" class="modal">
        <div class="modal-content">
            <div id="modalContentName" class="modal-name">モーダルコンテンツ名</div>
            
            <div class="modal-source">
                <img id="imgModal">
                <object id="textModal"></object>
            </div>
        </div>
    </div>

    <div class="container">
            
        <div class="row py-2 justify-content-center"><!-- ヘッダー用コンテナ -->

            <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6"><!-- ヘッダー用のコンテナサイズ -->

                <!-- ナビ -->
                <div class="row nav justify-content-between">
                    <a class="col" href="G1-4-1.php" title="みんなの投稿"><i class="bi bi-house-door"></i></a>
                    <a class="col" href="G1-6-1-1.php" title="じぶんの投稿"><i class="bi bi-person-lines-fill"></i></i></a>
                    <a class="col" href="G1-7.php" title="ランキング"><i class="bi bi-trophy"></i></a>
                    <a class="col" href="G1-5.php" title="投稿"><i class="bi bi-plus-circle"></i>
                    <a class="col" href="G1-8.php" title="開催イベント"><i class="bi bi-flag"></i></a>
                    <a class="col" href="G1-9-1.php" title="ステータス"><i class="bi bi-person-circle"></i></a>
                    <a class="col" href="G1-10.php" title="ヘルプ？"><i class="bi bi-question-circle"></i></a>
                </div>
                <!--/ナビ -->

                <!-- 見出し -->
                <div class="row">
                    <div class="header-title" title="投稿を入力して [送信] を押してください">
                        投稿
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- 用コンテナ -->

            <div class="col-11 col-lg-10 col-xl-9"><!-- 用のコンテナサイズ -->

                <!-- 投稿内容 -->

                <form action="G1-5(b).php" method="post" enctype="multipart/form-data">

                <div class="row">

                    <div class="mb col-lg-5">
                        <label for="subject">授業科目</label>
                        <input type="text" id="subject" name="subject" maxlength="30" required>
                    </div>

                    <div class="mb col-lg-7">
                        <label for="postTitle">タイトル</label>
                        <input type="text" id="postTitle" name="postTitle" maxlength="30" required>
                    </div>

                </div>

                <div>
                    <label>投稿内容</label>
                </div>

                <div class="row tdiv">

                    <div class="td col-3">
                        <div class="row justify-content-center pt-2">

                            <label class="td source-box py-2 col-10">
                                    <input type="file" id="img" name="post_image" accept="image/*" style="display: none;" onchange="viewImg(this)">
                                <i class="bi bi-image"></i> IMG <i class="bi bi-upload"></i>
                            </label>
                            <div id="imgBox" class="td source-box col-10" style="display: none;" onclick="previewImg()">
                                <img id="preview">
                            </div>
                            <label class="td source-box py-2 col-10">
                                    <input type="file" id="src" name="post_file" accept="text/*, .java, .php, .sql" style="display: none;" onchange="viewSrc(this)">
                                    <i class="bi bi-text-left"></i> SRC <i class="bi bi-upload"></i>
                            </label>
                            <div id="srcBox" class="td black source-box py-2 col-10" style="display: none; box-shadow: none; outline: none">
                            
                            </div>
                        
                        </div>
                    </div>

                    <textarea class="td col-9" id="textarea" name="text"  required style="white-space: wrap; overflow-y: auto;"></textarea>
                    
                </div>

                <div class="row mb justify-content-end">

                    <div class="col-4 col-md-3">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="submit" class="black" value="送信">
                        </div>
                    </div>

                </div>

                </form>

            </div>

        </div>

    </div>

</body>

<script src="script/script.js"></script>

</html>