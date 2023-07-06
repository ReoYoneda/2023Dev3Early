<?php

    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:G1-1.php');
    }

    $_SESSION['num']++;
    if($_SESSION['num'] != 1){
        exit;
    }

    require_once "A_DBManager.php";
    $create_post = new DBManager();
    $text = str_replace('<', '&lt;', $_POST["text"]);
    $text = str_replace('>', '&gt;', $text);
    
    $create_post->create_reply($_POST["postID"],$_SESSION["userID"],$text);

    $target = array('\'', '"');
    if(is_uploaded_file($_FILES['reply_image']['tmp_name'])){

        if(!file_exists('image')){
            mkdir('image');
        }
        
        $file = 'image/'.date("YmdHis")."_".str_replace($target,'',basename($_FILES['reply_image']['name']));//ファイルの名前だけの保存
        if(move_uploaded_file($_FILES['reply_image']['tmp_name'],$file)){//$fileに名前が格納されている　一時的なファイル,保存先のファイル
            $create_post->create_reply_image($file);
        }

    }

    if(is_uploaded_file($_FILES['reply_file']['tmp_name'])){

        if(!file_exists('text')){
            mkdir('text');
        }

        $extension = explode(".",$_FILES['reply_file']['name']);
        $file= 'text/'.date("YmdHis")."_".$extension[0].".txt";
        if(move_uploaded_file($_FILES['reply_file']['tmp_name'],$file)){
            $create_post->create_reply_file($file);
        }

    }

?>
<script>
    history.go(-2);
</script>