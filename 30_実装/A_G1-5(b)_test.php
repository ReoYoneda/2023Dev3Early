<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }

    require_once "A_DBManager.php";
    $create_post = new DBManager();
    $create_post->create_post($_SESSION["userID"],$_POST["title"],$_POST["subject"],$_POST["text"]);
    if(is_uploaded_file($_FILES['post_image']['tmp_name'])){
        if(!file_exists('image')){
            mkdir('image');
        }
        $file= 'image/'.date("YmdHis")."_".basename($_FILES['post_image']['name']);//ファイルの名前だけの保存
        if(move_uploaded_file($_FILES['post_image']['tmp_name'],$file)){//$fileに名前が格納されている　一時的なファイル,保存先のファイル
            echo $file, 'のアップロードに成功しました。';
            $result = glob('image/*');//ファイルの一覧（名前）を取得
            echo '<p>';
            foreach($result as $a){
                echo '<img src="',$a,'" height="400px" width="400px">';
            }
            $create_post->create_post_image($file);
            echo '</p>';
        }else{
            echo '画像ファイルのアップロードに失敗しました。';
        }
    }else{
        echo '画像ファイルは選択されていません。';
    }



    if(is_uploaded_file($_FILES['post_file']['tmp_name'])){
        if(!file_exists('text')){
            mkdir('text');
        }

        $extension = explode(".",$_FILES['post_file']['name']);
        $file= 'text/'.date("YmdHis")."_".$extension[0].".txt";

        if(move_uploaded_file($_FILES['post_file']['tmp_name'],$file)){
            echo $file, 'のアップロードに成功しました。';
            $result = glob('text/*');
            echo '<p>';
            foreach($result as $a){
                echo '<object data="'.$a.'"></object>';
            }
            $create_post->create_post_file($file);
            echo '</p>';
        }else{
            echo 'テキストファイルのアップロードに失敗しました。';
        }
    }else{
        echo 'テキストファイルは選択されていません。';
    }
?>