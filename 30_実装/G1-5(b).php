<?php

    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }

    require_once "A_DBManager.php";
    $create_post = new DBManager();
    $text = str_replace('<', '&lt;', $_POST["text"]);
    $text = str_replace('>', '&gt;', $text);
    $text = nl2br($text);
    $create_post->create_post($_SESSION["userID"],$_POST["postTitle"],$_POST["subject"],$text);

    $target = array('\'', '"');
    if(is_uploaded_file($_FILES['post_image']['tmp_name'])){

        if(!file_exists('image')){
            mkdir('image');
        }

        $file = 'image/'.date("YmdHis")."_".str_replace($target,'',basename($_FILES['post_image']['name']));//ファイルの名前だけの保存
        if(move_uploaded_file($_FILES['post_image']['tmp_name'],$file)){//$fileに名前が格納されている　一時的なファイル,保存先のファイル
            $create_post->create_post_image($file);
        }

    }
    
    if(is_uploaded_file($_FILES['post_file']['tmp_name'])){

        if(!file_exists('text')){
            mkdir('text');
        }

        $extension = explode(".",$_FILES['post_file']['name']);
        $file= 'text/'.date("YmdHis")."_".$extension[0].".txt";
        if(move_uploaded_file($_FILES['post_file']['tmp_name'],$file)){
            $create_post->create_post_file($file);
        }

    }
    
    header('Location:G1-6-1-1.php')

?>