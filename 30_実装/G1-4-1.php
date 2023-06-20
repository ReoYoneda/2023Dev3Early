<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }
?>
<?php
    require_once "A_DBManager.php";
    $get = new DBManager();
    $posts = array_reverse($get->get_posts());
    $users = $get->get_users();
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Posts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>

    <div class="container">
            
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
                <div class="row">
                    <div class="header-title" title="みんなの投稿一覧です。 気になる投稿を押してみましょう">
                        みんなの投稿
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-11 col-md-10 col-lg-9 col-xl-7"><!-- 用のコンテナサイズ -->
            
                <!-- 投稿情報 -->
                <?php 
                foreach($posts as $post){
                    if($post["post_flag"] == 0){
                        continue;
                    }
                    $user = $get->get_user_info($post["user_id"]);
                    $postID = $post["post_id"];
                    echo 
                    '<div class="row tdiv" onclick="location.href='."'A_G1-4-2.php?postID=".$postID."'".'">

                        <div class="td col-md-6">'.date('Y/m/d　H:i',strtotime($post["post_date"])).'</div>
                        <div class="td col-md-6 d-none d-md-block">'.$user["user_name"].'</div>
                    
                        <div class="td col-6 col-md-4">'.$user["user_course"].'</div>
                        <div class="td col-2 col-md-2">'.$user["user_grade"].'年</div>
                        <div class="td col-4 col-md-3">'.$user["user_classname"].'</div>
                        <div class="td col-md-3 d-none d-md-block">　L v　:　'.$user["user_lv"].'</div>
                    
                        <div class="td col-md-9">科目 : '.$post["post_subject"].'</div>
                        <div class="td col-md-3 d-none d-md-block">　DP　:　'.$user["user_dp"].'</div>
                    
                        <div class="td title col-md-9">'.$post["post_title"].'</div>
                        <div class="col-md-3 d-none d-md-block">
                            <div class="row">
                                <div class="td m-0">　被評 :　'.$user["user_Ravg"].'</div>
                                <div class="td m-0">　与評 :　'.$user["user_Savg"].'</div>
                            </div>
                        </div>
                                
                    </div>';
                }

                ?>

            </div>

        </div>

    </div>
    
</body>
</html>