<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }

    require_once "A_DBManager.php";
    $get = new DBManager();
    $postID = $_GET["postID"];
    $post = $get->get_post($postID);
    $userID = $post["user_id"];

    if($userID == $_SESSION["userID"]){
        header('Location:A_G1-6-1-2.php?postID='.$postID);
    }

    $user = $get->get_user_info($userID);

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

    <div class="container">
            
        <div class="row py-2 justify-content-center"><!-- ヘッダー用コンテナ -->

            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5"><!-- ヘッダー用のコンテナサイズ -->

                <!-- ナビ -->
                <div class="row nav">
                    <a class="col" href="G1-4-1.php" title="みんなの投稿"><i class="bi bi-house-door"></i></a>
                    <a class="col" href="G1-6-1-1.php" title="じぶんの投稿"><i class="bi bi-person-lines-fill"></i></i></a>
                    <a class="col" href="G1-7.php" title="ランキング"><i class="bi bi-trophy"></i></a>
                    <a class="col" href="G1-8.php" title="開催イベント"><i class="bi bi-flag"></i></a>
                    <a class="col" href="G1-9-1.php" title="ステータス"><i class="bi bi-person-circle"></i></a>
                    <a class="col" href="G1-10.php" title="ヘルプ？"><i class="bi bi-question-circle"></i></a>
                </div>
                <!--/ナビ -->

                <!-- 見出し -->
                <div class="row">
                    <div class="header-title" title="回答するときは[回答]を押してください">
                        回答一覧
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-11 col-lg-10 col-xl-9"><!-- 用のコンテナサイズ -->
            
                <!-- 投稿情報 -->
                <div class="row tdiv">

                    <div class="td col-6"><?php echo date('Y/m/d　H:i',strtotime($post["post_date"])) ?></div>
                    <div class="td col-6"><?php echo $user["user_name"] ?></div>

                    <div class="td col-6 col-md-4"><?php echo $user["user_course"] ?></div>
                    <div class="td col-2 col-md-2"><?php echo $user["user_grade"] ?></div>
                    <div class="td col-4 col-md-3"><?php echo $user["user_classname"] ?></div>
                    <div class="td col-md-3 d-none d-md-block">　L v　:　<?php echo $user["user_lv"] ?></div>
                
                    <div class="td col-md-9">科目 : <?php echo $post["post_subject"] ?></div>
                    <div class="td col-md-3 d-none d-md-block">　DP　:　<?php echo $user["user_dp"] ?></div>
                
                    <div class="td title col-md-9"><?php echo $post["post_title"] ?></div>
                    <div class="col-md-3 d-none d-md-block">
                        <div class="row">
                            <div class="td m-0">　被評 :　<?php echo $user["user_Ravg"] ?></div>
                            <div class="td m-0">　与評 :　<?php echo $user["user_Savg"] ?></div>
                        </div>
                    </div>
                    
                    <div class="td p-0 col-3">
                        <div class="row justify-content-center">
                            <div class="b-source mt-2 p-0 col-9">
                                <?php
                                if($post["post_image_path"]!=null){
                                    echo '<img src="'.$post["post_image_path"].'" height="100px" widht="100%">';
                                }
                                ?>
                            </div>
                            <bottun id="modal-trigger" class="b-source mt-2 col-9">
                                <?php
                                if($post["post_file_path"]!=null){
                                    echo substr($post["post_file_path"],20);
                                }
                                ?>    
                            </button>
                        </div>
                    </div>
                    <div class="td col-9" style="white-space: wrap; overflow: hidden;">
                        <?php echo $post["post_text"] ?>
                    </div>
                </div>

                <div class="row tdiv">

                    <div class="td col-6">2023/05/01 20:20</div>
                    <div class="td col-6">（ここはニックネームです）</div>
                
                    <div class="td p-0 col-3">
                        <div class="row justify-content-center">
                            <div class="b-source mt-2 p-0 col-9">
                                <?php
                                if($post["post_image_path"]!=null){
                                    echo '<img src="'.$post["post_image_path"].'" height="100px" widht="100%">';
                                }
                                ?>
                            </div>
                            <bottun id="modal-trigger" class="b-source mt-2 col-9">
                                <?php
                                if($post["post_file_path"]!=null){
                                    echo $post["post_file_path"];
                                }
                                ?>    
                            </button>
                        </div>
                    </div>
                    <div class="td col-9" style="white-space: wrap; overflow: hidden;">
                        
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="p-2">モーダルのコンテンツ</div>
            
            <div class="modal-source">
                <img src="A_img/img2.jpg">
                <object data="text/20230603184500_A_G1-2-3(b).txt"></object>
            </div>
        </div>
    </div>

<script>

// モーダルを開くためのトリガー要素を取得
var modalTrigger = document.getElementById("modal-trigger");

// モーダル要素を取得
var modal = document.getElementById("modal");

// トリガーをクリックしたときにモーダルを表示する
modalTrigger.onclick = function () {
  modal.style.display = "block";
};

// モーダル外の領域をクリックしたときにモーダルを非表示にする
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
</script>
<style>

.b-source{
    background-color: #f0f0f0;
    border-radius: 4px;
    box-shadow: 0px 0px 1.5px 1.5px #ccc;
    white-space: nowrap;
    overflow: hidden;
}
.b-source>img{
    width: 100%;
    object-fit: cover;
}

/* モーダルを非表示にする */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-source>img{
    width: 100%;
    object-fit: contain;
}
object{
    min-height: 700px;
    width: 100%;
}

/* モーダルのコンテンツ */
.modal-content {
  position: fixed;
  top: 50%;
  left: 50%;
  background-color: #eee;
  transform: translate(-50%, -50%);
  width: 90%;
  max-height: 85%;
  height: fit-content;
  text-align: center;
}

.modal-source{
    width: 95%;
    margin: 0 auto 2%;
    overflow: scroll;
}

</style>

</body>

</html>


<input type="button" onclick="location.href='A_G1-4-1.php'" value="戻る">
<input type="button" onclick="location.href='A_G1-4-3.php?postID=<?php echo $_GET['postID'] ?>'" value="回答">

<?php  
    

    echo
    '<div>
    名前　　 : '.$user["user_name"].'<br>
    日時 　　: '.date('Y/m/d　H:i',strtotime($post["post_date"])).'<br>
    学科　　 : '.$user["user_course"].'<br>
    Lv　　　 : '.$user["user_lv"].'<br>
    DP 　 　 : '.$user["user_dp"].'<br>
    被評　　 : '.$user["user_Ravg"].'<br>
    与評　　 : '.$user["user_Savg"].'<br>
    授業科目 : '.$post["post_subject"].'<br>
    タイトル : '.$post["post_title"].'<br>
    質問内容 : '.$post["post_text"].'<br>';
    if($post["post_image_path"]!=null){
        echo '<img src="'.$post["post_image_path"].'" height="200px" widht="200px"><br>';
    }
    if($post["post_file_path"]!=null){
        echo '<object data="'.$post["post_file_path"].'"></object><br>';
    }

    echo '</div>';


    
    foreach($replies as $reply){
        $user = $get->get_user_info($reply["user_id"]);
        $reply = $get->get_reply($reply["reply_id"]);
        echo
        '<div>----------------------------------------------------------------------------<br>'.
        '名前　　 : '.$user["user_name"].'<br>
        日時　　 : '.date('Y/m/d　H:i',strtotime($reply["reply_date"])).'<br>
        回答文　 : '.$reply["reply_text"].'<br>';
        if($reply["reply_image_path"]!=null){
            echo '<img src="'.$reply["reply_image_path"].'" height="200px" widht="200px"><br>';
        }
        if($reply["reply_file_path"]!=null){
            echo '<object data="'.$reply["reply_file_path"].'"></object><br>';
        }
        echo '</div>';
    }

?>