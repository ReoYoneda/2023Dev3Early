<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:G1-1.php');
    }

    require_once "A_DBManager.php";
    $get = new DBManager();
    $postID = $_GET["postID"];
    $post = $get->get_post($_GET["postID"]);
    $user = $get->get_user_info($_SESSION["userID"]);
    $replies = $get->get_replies($postID);
?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Replies</title>
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
            
        <div class="row justify-content-center"><!-- ヘッダー用コンテナ -->

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
                    <div class="header-title" title="回答一覧です">
                        回答一覧
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- 用コンテナ -->

            <div class="col-11 col-lg-10 col-xl-9"><!-- 用のコンテナサイズ -->

                <div class="row mb">

                    <div class="col-4 col-md-3">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="button" value="戻る" onclick="history.back()">
                        </div>
                    </div>
                    
                </div>

                <!-- 投稿情報 -->
                <div class="row tdiv">

                    <div class="td col-6 col-md-9"><?php echo $user["user_name"] ?></div>
                    <div class="td text-center col-6 col-md-3"><?php echo date('Y/m/d　H:i',strtotime($post["post_date"])) ?></div>
                
                    <div class="td col-md-9">科目 : <?php echo $post["post_subject"] ?></div>
                    <div class="td col-md-3 d-none d-md-block">　</div>
                
                    <div class="td post-title col-md-9"><?php echo $post["post_title"] ?></div>
                    <div class="col-md-3 d-none d-md-block">
                        <div class="row">
                            <div class="td m-0">　</div>
                            <div class="td m-0">　</div>
                        </div>
                    </div>
                    
                    <div class="td col-md-3">
                        <div class="row justify-content-center pt-2">
                            <?php 
                            if($post["post_image_path"]!=null){
                                echo 
                            '<div class="col-6 col-md-12">
                                <div class="row justify-content-center">
                                    <div class="td source-box col-10" onclick="openImg('."'".$post['post_image_path']."'".')">
                                        <img src="'.$post["post_image_path"].'">
                                    </div>
                                </div>
                            </div>';
                            }
                            if($post["post_file_path"]!=null){
                                echo 
                            '<div class="col-6 col-md-12">
                                <div class="row justify-content-center">
                                    <div class="td black source-box py-2 col-10" onclick="openText('."'".$post['post_file_path']."'".')">
                                        '.substr($post["post_file_path"],20).'
                                    </div>
                                </div>
                            </div>';
                            }
                            ?>

                        </div>
                    </div>

                    <div class="td text-display col-md-9"><?php echo $post["post_text"] ?></div>

                </div>

                <?php 
                foreach($replies as $reply){
                    $user = $get->get_user_info($reply["user_id"]);
                    $reply = $get->get_reply($reply["reply_id"]);
                    echo '
                <div class="row tdiv">

                    <div class="td col-6 col-md-9">'.$user["user_name"].'</div>
                    <div class="td text-center col-6 col-md-3">'.date('Y/m/d　H:i',strtotime($reply["reply_date"])).'</div>

                    <div class="td col-md-3">
                        <div class="row justify-content-center pt-2">';
                            
                            if($reply["reply_image_path"]!=null){
                                echo 
                            '<div class="col-6 col-md-12">
                                <div class="row justify-content-center">
                                    <div class="td source-box col-10" onclick="openImg('."'".$reply["reply_image_path"]."'".')">
                                        <img src="'.$reply["reply_image_path"].'">
                                    </div>
                                </div>
                            </div>';
                            }
                            if($reply["reply_file_path"]!=null){
                                echo 
                            '<div class="col-6 col-md-12">
                                <div class="row justify-content-center">
                                    <div class="td black source-box py-2 col-10" onclick="openText('."'".$reply["reply_file_path"]."'".')">
                                    '.substr($reply["reply_file_path"],20).'
                                    </div>
                                </div>
                            </div>';
                            }
                            
                    echo '
                        </div>
                    </div>

                    <div class="td text-display col-md-9">'.$reply["reply_text"].'</div>
                    
                </div>';
                }
                
                ?>


            </div>

        </div>

    </div>

</body>
<script src="script/script.js"></script>
</html>