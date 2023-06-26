<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }

    require_once "A_DBManager.php";
    $get = new DBManager();
    $posts = array_reverse($get->get_my_posts($_SESSION["userID"]));
?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>MyPosts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
</head>

<body class="G1-6-1-1">

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
                    <div class="header-title" title="掲示中の投稿一覧です">
                        じぶんの投稿
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- 用コンテナ -->

            <div class="col-11 col-lg-10 col-xl-9"><!-- 用のコンテナサイズ -->

                <div class="row mb
                            justify-content-between">

                    <div class="col-4 col-md-3">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="button" value="Open" onclick="location.href='G1-6-1-1.php'" style="outline: 4px solid #74f;">
                        </div>
                    </div>

                    <div class="col-4 col-md-3">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                        <input type="button" value="Closed" onclick="location.href='G1-6-2-1.php'">
                        </div>
                    </div>
                    
                </div>

                <!-- 投稿情報 -->
                <?php
                foreach($posts as $post){
                    if($post["post_flag"] == 0){
                        continue;
                    }
                    $postID = $post["post_id"];
                    echo '
                <div class="row tdiv" onclick="location.href=\'G1-6-1-2.php?postID='.$postID.'\'">

                    <div class="td col-md-3 d-none d-md-block">
                        <div class="row justify-content-center pt-2">';
                            if($post["post_image_path"]!=null){
                                echo 
                            '<div class="td source-box col-10" onclick="toImgModal(event, \''.$post['post_image_path'].'\')">
                                <img src="'.$post["post_image_path"].'">
                            </div>';
                            }
                            if($post["post_file_path"]!=null){
                                echo 
                            '<div class="td black source-box py-2 col-10" onclick="toTextModal(event, \''.$post['post_file_path'].'\')">
                                '.substr($post["post_file_path"],20).'
                            </div>';
                            }
                        
                        echo '
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="td">'.date('Y/m/d　H:i',strtotime($post["post_date"])).'</div>
                            <div class="td">科目 : '.$post["post_subject"].'</div>
                            <div class="td post-title" style="height: 115px">'.$post["post_title"].'</div>
                        </div>
                    </div>

                </div>';
                }
                ?>

            </div>

        </div>

    </div>

</body>
<script src="script/script.js"></script>
<script>
    function toImgModal(event,path){
        event.stopPropagation();
        openImg(path);
    }
    function toTextModal(event,path){
        event.stopPropagation();
        openText(path);
    }
</script>
</html>