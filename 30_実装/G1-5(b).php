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

    $text = str_replace("z slash z","/",$text);
    $text = str_replace("z point z","`",$text);
    $text = str_replace("z s-elect z","select",$text);
    $text = str_replace("z S-elect z","Select",$text);
    $text = str_replace("z S-ELECT z","SELECT",$text);
    $text = str_replace("z i-nsert z","insert",$text);
    $text = str_replace("z I-nsert z","Insert",$text);
    $text = str_replace("z I-NSERT z","INSERT",$text);
    $text = str_replace("z u-pdate z","update",$text);
    $text = str_replace("z U-pdate z","Update",$text);
    $text = str_replace("z U-PDATE z","UPDATE",$text);
    $text = str_replace("z d-elete z","delete",$text);
    $text = str_replace("z D-elete z","Delete",$text);
    $text = str_replace("z D-ELETE z","DELETE",$text);
    $text = str_replace("z c-reate z","create",$text);
    $text = str_replace("z C-reate z","Create",$text);
    $text = str_replace("z C-REATE z","CREATE",$text);
    $text = str_replace("z a-lter z","alter",$text);
    $text = str_replace("z A-lter z","Alter",$text);
    $text = str_replace("z A-LTER z","ALTER",$text);
    $text = str_replace("z d-rop z","drop",$text);
    $text = str_replace("z D-rop z","Drop",$text);
    $text = str_replace("z D-ROP z","DROP",$text);
    
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

?>
<script>
    //history.go(0);
    location.replace('G1-6-1-1.php');
</script>