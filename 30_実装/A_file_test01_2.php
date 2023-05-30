<?php
    if(is_uploaded_file($_FILES['post_file']['tmp_name'])){
        if(!file_exists('image')){
            mkdir('image');
        }
        $file='image/'.basename($_FILES['post_file']['name']);//ファイルの名前だけの保存
        if(move_uploaded_file($_FILES['post_file']['tmp_name'],$file)){//$fileに名前が格納されている　一時的なファイル,保存先のファイル
            echo $file, 'のアップロードに成功しました。';
            $result = glob('image/*');//ファイルの一覧（名前）を取得
            echo '<p>';
            foreach($result as $a){
                echo '<img src="',$a,'" height="200px">';
            }
            echo '</p>';
        }else{
            echo 'アップロードに失敗しました。';
        }
    }else{
        echo 'ファイルを選択してください。';
    }
?>